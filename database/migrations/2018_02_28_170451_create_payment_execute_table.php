<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentExecuteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_execute', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('payment_option', 15);
            $table->enum('payment_type', ['register', 'partial', 'full', 'other'])->nullable();
            $table->integer('course_id')->unsigned();
            $table->string('ip', 35)->nullable();
            $table->string('token', 25)->nullable();
            $table->boolean('confirmed')->nullable($value = true);
            $table->string('confirmation',25)->nullable();
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
        Schema::dropIfExists('payment_execute');
    }
}
