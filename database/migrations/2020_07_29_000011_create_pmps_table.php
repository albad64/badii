<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePmpsTable extends Migration
{
    public function up()
    {
        Schema::create('pmps', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pmp_year');
            $table->float('objective_value', 8, 2)->nullable();
            $table->date('objective_mid_review_date')->nullable();
            $table->date('objective_end_eval_date')->nullable();
            $table->float('overall_mid_year_evaluation', 8, 2)->nullable();
            $table->float('overall_end_year_evaluation', 8, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
