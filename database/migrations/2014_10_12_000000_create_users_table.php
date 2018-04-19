<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     ** php artisan migrate
     ** php artisan migrate:fresh --seed
     ** php artisan make:seeder StateList
     ** php artisan db:seed --class=StateList
     ** @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('email', 100)->unique();
            $table->string('address', 150);
            $table->string('zipcode', 10);
            $table->string('state', 2);
            $table->string('phone', 25);
            $table->string('password');
            $table->boolean('consent')->nullable($value = true);
            $table->string('status', 10);
            $table->string('ip', 15)->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
