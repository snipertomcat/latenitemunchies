<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->char('first_name', 150);
            $table->char('last_name', 150);
            $table->char('address1', 255);
            $table->char('address2', 255);
            $table->char('city', 255);
            $table->char('state', 255);
            $table->char('zip', 11);
            $table->char('phone', 20);
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
        Schema::drop('customers');
    }
}
