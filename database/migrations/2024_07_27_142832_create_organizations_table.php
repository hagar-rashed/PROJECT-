<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->id();
            $table->string('organization_name');
            $table->string('user_name');
            $table->string('government');
            $table->string('organization_address');
            $table->string('city');
            $table->string('add_image')->nullable();
            $table->string('organization_owner');
            $table->string('organization_type');
            $table->string('password');
            $table->string('phone');
            $table->string('discount_type');
            $table->decimal('package_value', 8, 2);
            $table->string('package_type');
            $table->decimal('discount_value', 8, 2);
            $table->date('date');
            $table->string('hold')->default('0');
            $table->decimal('rate', 8, 2)->nullable();
            $table->text('comments')->nullable();
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
        Schema::dropIfExists('organizations');
    }
}
