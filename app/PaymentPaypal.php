<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentPaypal extends Model
{
    //

    protected $guarded = [
        'id',
        'user_id',
        'payer_id',
        'payment_id'
    ];

    protected $fillable = [
        'payer_name',
        'payer_email',
        'cart_number',
        'sale_state',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'sale_id',
        'sale_amount',
        'transaction_fee',
        'transaction_date',
    ];


}
