<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('government');
            $table->string('national_id');
            $table->string('password');
            $table->string('user_name');
            $table->string('delivery_name');
            $table->decimal('amount_paid', 10, 2);
            $table->string('city');
            $table->date('registration_date');
            $table->date('registration_start');
            $table->date('registration_end');
            $table->string('request_status');
            $table->integer('registration_duration');
            $table->string('coupon_number');
            $table->boolean('hold')->default(false);
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
        Schema::dropIfExists('new_customers');
    }
}
