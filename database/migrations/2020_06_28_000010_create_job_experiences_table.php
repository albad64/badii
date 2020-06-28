<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobExperiencesTable extends Migration
{
    public function up()
    {
        Schema::create('job_experiences', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_number');
            $table->string('company_name');
            $table->string('company_role')->nullable();
            $table->date('job_start_date')->nullable();
            $table->date('job_end_date')->nullable();
            $table->longText('job_description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
