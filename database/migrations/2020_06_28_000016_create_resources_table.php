<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResourcesTable extends Migration
{
    public function up()
    {
        Schema::create('resources', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->date('hired_date');
            $table->date('termination_date')->nullable();
            $table->string('status');
            $table->string('title')->nullable();
            $table->string('gender')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('birth_city')->nullable();
            $table->string('nationality')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('fiscal_code')->nullable();
            $table->string('vat_number')->nullable();
            $table->boolean('company_partner')->default(0)->nullable();
            $table->boolean('protected_categories')->default(0)->nullable();
            $table->float('disability_percentage', 15, 2)->nullable();
            $table->string('ice_person')->nullable();
            $table->string('ice_phone')->nullable();
            $table->string('ice_email')->nullable();
            $table->string('address_street')->nullable();
            $table->string('address_city')->nullable();
            $table->string('address_postalcode')->nullable();
            $table->string('address_state')->nullable();
            $table->string('work_phone')->nullable();
            $table->string('home_phone')->nullable();
            $table->string('office_phone')->nullable();
            $table->string('home_email')->nullable();
            $table->string('work_email')->unique();
            $table->string('other_email')->nullable();
            $table->string('resource_code')->unique();
            $table->string('suite_users')->nullable();
            $table->string('alt_address_street')->nullable();
            $table->string('alt_address_city')->nullable();
            $table->string('alt_address_postalcode')->nullable();
            $table->string('alt_address_state')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
