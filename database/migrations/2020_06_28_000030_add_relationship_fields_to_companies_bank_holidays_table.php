<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCompaniesBankHolidaysTable extends Migration
{
    public function up()
    {
        Schema::table('companies_bank_holidays', function (Blueprint $table) {
            $table->unsignedInteger('company_id');
            $table->foreign('company_id', 'company_fk_1728276')->references('id')->on('companies');
        });
    }
}
