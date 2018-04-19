<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentPaypalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_paypals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('payer_id', 50);
            $table->string('payment_id', 50)->unique();
            $table->string('payer_email', 80);
            $table->string('payer_name', 120);
            $table->string('cart_number', 50);
            $table->string('sale_id', 50);
            $table->string('sale_state', 10);
            $table->float('sale_amount', 6,2);
            $table->float('transaction_fee', 4,2);
            $table->timestampTz('transaction_date')->nullable();
            $table->timestamp('last_update')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_paypals');
    }
}
