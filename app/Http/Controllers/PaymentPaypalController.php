<?php

namespace App\Http\Controllers;

use Paypal;
use Redirect;
use App\Http\Requests;
use App\PaymentPaypal;
use App\PaymentExecute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


class PaymentPaypalController extends Controller
{
    private $_apiContext;

    public function __construct()
    {
        $this->middleware('auth');
        $this->_apiContext = PayPal::ApiContext(
            config('services.paypal.client_id'),
            config('services.paypal.secret')
        );

        $this->_apiContext->setConfig(
            array(
                'mode' => env('PAYPAL_CLIENT_MODE', 'live'), // 'sandbox',
                'service.EndPoint' => 'https://api.sandbox.paypal.com',
                'http.ConnectionTimeOut' => 30,
                'log.LogEnabled' => true,
                'log.FileName' => storage_path('logs/paypal.log'),
                'log.LogLevel' => 'FINE'
        ));

    }

    public function getPaymentView()
    {
        // return view( 'payments' );
        $data['info']='Secure Online Payments With PayPal';
        $data['checkout']= 'checkout';
        return \View::make('payments')->with($data);
    }

    public function getPaymentCheckout(Request $request)
    {
        \Debugbar::info( Auth::user()->id );

        try {
            // Init paypal user
            $ppPayers = PaymentExecute::create([
                'user_id' => Auth::user()->id,
                'payment_option' => 'paypal',
                'payment_type' => $request->input('type'),
                'course_id' => $request->input('course_id'),
                'confirmed' => null,
            ]);
            // last inserted id
            \Session::put('id', $ppPayers->id);

        } catch ( PDOException $e ) {
            Log::info('Showing p-pal cancelation for user: _'. $e->getMessage());
            return redirect()->to( route('payments') );
        }

        try {
            // Create Payment:: posting to the APIService
            $payer = PayPal::Payer();
            $payer->setPaymentMethod('paypal');

            $amount = PayPal:: Amount();
            $amount->setCurrency('USD');
            $amount->setTotal($request->input('pay'));

            $transaction = PayPal::Transaction();
            $transaction->setAmount($amount);
            $transaction->setDescription('PaymentsFor_:'.$request->input('course_id').'+PaymetType_:'.$request->input('type').'+PaidAmount_:'.$request->input('pay'));

            $redirectUrls = PayPal:: RedirectUrls();
            $redirectUrls->setReturnUrl(route('checkoutSuccess'));
            $redirectUrls->setCancelUrl(route('checkoutCancel'));

            $payment = PayPal::Payment();
            $payment->setIntent('sale');
            $payment->setPayer($payer);
            $payment->setRedirectUrls($redirectUrls);
            $payment->setTransactions(array($transaction));

            $response = $payment->create($this->_apiContext);
            $redirectUrl = $response->links[1]->href;
        } catch (\PPConnectionException $ex) {
            \Log::info('Showing p-pal cancelation for user: ');
            return redirect()->to( route('checkoutError') );
        }

        return redirect()->to( $redirectUrl );
    }

    public function payPalSuccess(Request $request)
    {
        $pp_payment_id = $request->get('paymentId');
        $pp_payer_id = $request->get('PayerID');
        $pp_payer_token = $request->get('token');

        try {
            $payment = PayPal::getById($pp_payment_id, $this->_apiContext);
            $paymentExecution = PayPal::PaymentExecution();
            $paymentExecution->setPayerId($pp_payer_id);
            $executePayment = $payment->execute($paymentExecution, $this->_apiContext);
        } catch (\PPConnectionException $ex) {
             \Log::info('Showing p-pal cancelation for user: '.$pp_payer_token);
        }

        $email = $executePayment->payer->payer_info->email;
        $name = $executePayment->payer->payer_info->first_name.'_'.$executePayment->payer->payer_info->last_name;
        $cart = $executePayment->cart;
        $saleId = $executePayment->transactions[0]->related_resources[0]->sale->id ?? 'Fake103';
        $state = $executePayment->transactions[0]->related_resources[0]->sale->state ?? 'pending';
        $create_time = $executePayment->transactions[0]->related_resources[0]->sale->create_time??date("Y-m-d H:i:s");
        $amount = $executePayment->transactions[0]->related_resources[0]->sale->amount->total ?? 00.0;
        $fees = $executePayment->transactions[0]->related_resources[0]->sale->transaction_fee->value ?? 00.0;
        //\Debugbar::info($value);


        try {
            $ppApiSuccess = new PaymentPaypal();
            $ppApiSuccess->user_id = Auth::user()->id;
            $ppApiSuccess->payer_id = $pp_payer_id;
            $ppApiSuccess->payment_id = $pp_payment_id;
            $ppApiSuccess->payer_email = $email;
            $ppApiSuccess->payer_name = $name;
            $ppApiSuccess->cart_number = $cart;
            $ppApiSuccess->sale_id = $saleId;
            $ppApiSuccess->sale_state = $state;
            $ppApiSuccess->sale_amount = $amount;
            $ppApiSuccess->transaction_fee = $fees;
            $ppApiSuccess->transaction_date = date("Y-m-d H:i:s");
            $ppApiSuccess->save();

        } catch ( PDOException $e ) {
            \Log::info('Showing p-pal payments for user: '.$pp_payer_token);
            $data['warning']='Payment Transaction Not Completed. Please Review';
            return \View::make('payments')->with($data);
        }

        $data['confirmation'] = uniqid('SYYU',false );
        try {
            $ppUpdatePayers = PaymentExecute::find( \Session::pull( 'id' ));
            $ppUpdatePayers->token = $pp_payer_token;
            $ppUpdatePayers->confirmed = 1;
            $ppUpdatePayers->confirmation = $data['confirmation'];
            $ppUpdatePayers->ip = \Request::ip();
            $ppUpdatePayers->save();
        } catch ( PDOException $e ) {

            \Log::info('Showing p-pal payments for user: '.$pp_payer_token);
            $data['warning']='You have cancel your payment. Please review again ';
        }

        $data['success']='Your Payment Completed Successfully.';
        $data['vsuccess']= 'success';
        return \View::make('payments')->with($data);
    }

    public function payPalCancel( Request $request )
    {
        $pp_payer_token = $request->get('token');
        try {
            $ppUpdatePayers = PaymentExecute::find( \Session::pull( 'id' ));
            $ppUpdatePayers->token = $pp_payer_token;
            $ppUpdatePayers->confirmed = 0;
            $ppUpdatePayers->confirmation = null;
            $ppUpdatePayers->ip = \Request::ip();
            $ppUpdatePayers->save();
        } catch ( PDOException $e ) {
            //Log:error( $e->getMessage() );
            Log::info('Showing p-pal cancelation for user: '.$pp_payer_token);
        }

        $data['warning']='You have cancel your payment. Please review again ';
        return \View::make('payments')->with($data);

    }

    public function checkoutError()
    {
        // return 'fail to do that';
        $data['warning']='Please Contact with Admin or <br/> Email: Itlinkusa@gmail.com';
        return \View::make('payments')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     **/
    public function create()
    {
        //
        $data['warning']='Test Dev_101';
        return \View::make('init')->with($data);
    }


}
