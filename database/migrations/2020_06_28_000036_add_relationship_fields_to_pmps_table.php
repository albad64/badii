<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPmpsTable extends Migration
{
    public function up()
    {
        Schema::table('pmps', function (Blueprint $table) {
            $table->unsignedInteger('resource_code_id');
            $table->foreign('resource_code_id', 'resource_code_fk_1734338')->references('id')->on('resources');
            $table->unsignedInteger('current_grade_id');
            $table->foreign('current_grade_id', 'current_grade_fk_1734340')->references('id')->on('job_grades');
            $table->unsignedInteger('expected_grade_id');
            $table->foreign('expected_grade_id', 'expected_grade_fk_1734341')->references('id')->on('job_grades');
        });
    }
}
