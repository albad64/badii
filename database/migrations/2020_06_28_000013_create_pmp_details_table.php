<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePmpDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('pmp_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('number_detail')->nullable();
            $table->longText('sub_objective_detail')->nullable();
            $table->float('weight', 5, 2)->nullable();
            $table->string('kpi_description')->nullable();
            $table->string('target')->nullable();
            $table->longText('notes')->nullable();
            $table->float('mid_year_evaluation', 8, 2)->nullable();
            $table->float('mid_year_weight', 5, 2)->nullable();
            $table->string('mid_year_notes')->nullable();
            $table->float('end_year_evaluation', 8, 2)->nullable();
            $table->float('end_year_weight', 5, 2)->nullable();
            $table->string('end_year_notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
