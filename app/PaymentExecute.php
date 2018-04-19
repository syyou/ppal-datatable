<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentExecute extends Model
{
    //
    protected $table = 'payment_execute';
    //public $timestamps = false;

    // const CREATED_AT = 'payment_creation_date';
    //const UPDATED_AT = 'payment_last_update';

    protected $guarded = ['id'];
    protected $fillable = [
        'user_id',
        'payment_option',
        'payment_type',
        'course_id',
    ];

}
