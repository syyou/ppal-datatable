<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
| Test Route: Route::get('/', function () {    return view('welcome'); });
*/


// Route::view('/welcome', 'welcome'); -- return view

// Init page
Route::get('/', 'InitController@initIndex');
Route::get('/about', 'InitController@ourAbout' );
Route::get('/contact', 'InitController@ourContact' );
Route::get('/services', 'InitController@ourServices' );

// login User
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// Datatable at HomeController
Route::group( [
    'prefix' => 'payment', 'middleware/' => ['auth']
    ],
    function () {
            Route::get('getdata', 'HomeController@getPosts')->name('payment/getdata');
        }
    );

// Payment-component
Route::group([
    'middleware' => ['auth']
    ],
    function () {
            Route::get('payments', ['as'=>'payments','uses'=>'PaymentPaypalController@getPaymentView']);
            Route::post('process', ['as'=>'checkoutProgress','uses'=>'PaymentPaypalController@getPaymentCheckout']);
            Route::get('complete', ['as'=>'checkoutSuccess','uses'=>'PaymentPaypalController@payPalSuccess']);
            Route::get('cancel', ['as'=>'checkoutCancel','uses'=>'PaymentPaypalController@payPalCancel']);
            Route::get('error', ['as'=>'checkoutError','uses'=>'PaymentPaypalController@payPalError']);
        }
    );
