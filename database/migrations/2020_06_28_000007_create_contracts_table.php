<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->increments('id');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('head_office')->nullable();
            $table->string('contract_type')->nullable();
            $table->string('contract_duration')->nullable();
            $table->string('contract_time')->nullable();
            $table->string('area_type')->nullable();
            $table->date('termination_date')->nullable();
            $table->string('termination_code')->nullable();
            $table->float('calculation_lps', 15, 2)->nullable();
            $table->string('ccnl')->nullable();
            $table->string('clb_category')->nullable();
            $table->string('clb_level')->nullable();
            $table->string('us_category')->nullable();
            $table->date('end_trial_period_date')->nullable();
            $table->integer('weekly_working_hours')->nullable();
            $table->boolean('hr_canteen_charge')->default(0)->nullable();
            $table->longText('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
