<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesBankHolidaysTable extends Migration
{
    public function up()
    {
        Schema::create('companies_bank_holidays', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('year');
            $table->date('bank_holiday_date');
            $table->string('bank_holiday_name')->nullable();
            $table->boolean('bank_holiday_fix')->default(0)->nullable();
            $table->timestamps();
        });
    }
}
