<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobGradesTable extends Migration
{
    public function up()
    {
        Schema::create('job_grades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('job_grade_name')->unique();
            $table->string('organizational_area');
            $table->string('job_grade')->nullable();
            $table->string('job_level');
            $table->timestamps();
        });
    }
}
