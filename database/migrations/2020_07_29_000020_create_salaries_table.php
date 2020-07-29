<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalariesTable extends Migration
{
    public function up()
    {
        Schema::create('salaries', function (Blueprint $table) {
            $table->increments('id');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->boolean('remote_job')->default(0)->nullable();
            $table->string('week_working_string');
            $table->string('internal_department')->nullable();
            $table->string('internal_office')->nullable();
            $table->decimal('annual_base_salary', 15, 2)->nullable();
            $table->decimal('vat_daily_fee', 15, 2)->nullable();
            $table->decimal('vat_daily_cost', 15, 2)->nullable();
            $table->decimal('staffing_agency_amount', 15, 2)->nullable();
            $table->date('staffing_agency_end_date')->nullable();
            $table->float('reimb_km', 15, 5)->nullable();
            $table->boolean('nca')->default(0)->nullable();
            $table->date('nca_end_date')->nullable();
            $table->string('nca_frequency')->nullable();
            $table->decimal('nca_value', 15, 2)->nullable();
            $table->date('expected_next_lsb_date')->nullable();
            $table->decimal('monthly_lsb', 15, 2)->nullable();
            $table->string('variable_comp_target')->nullable();
            $table->decimal('variable_comp_value', 15, 2)->nullable();
            $table->longText('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
