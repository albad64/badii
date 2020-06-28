<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesHolidaysTable extends Migration
{
    public function up()
    {
        Schema::create('companies_holidays', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('level')->nullable();
            $table->integer('seniority');
            $table->float('days_for_month', 15, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
