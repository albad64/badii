<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company')->unique();
            $table->string('company_name');
            $table->string('invoice_prefix');
            $table->string('project_prefix');
            $table->float('legal_working_hours', 15, 2);
            $table->float('monthly_instalments', 15, 2)->nullable();
            $table->timestamps();
        });
    }
}
