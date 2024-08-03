<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Units extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->string('location');
            $table->string('lat');
            $table->string('lng');
            $table->string('name');
            $table->string('price');
            $table->string('owner_name');
            $table->string('desc');
       
            $table->boolean('booked');
            $table->timestamp("avilable_from");
            $table->timestamp("avilable_to")->nullable();
            $table->foreignId('village_id')->references('id')->on('villages');
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
        //
    }
}
