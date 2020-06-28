<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyCountryPivotTable extends Migration
{
    public function up()
    {
        Schema::create('company_country', function (Blueprint $table) {
            $table->unsignedInteger('company_id');
            $table->foreign('company_id', 'company_id_fk_1728248')->references('id')->on('companies')->onDelete('cascade');
            $table->unsignedInteger('country_id');
            $table->foreign('country_id', 'country_id_fk_1728248')->references('id')->on('countries')->onDelete('cascade');
        });
    }
}
