<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToHolidaysTable extends Migration
{
    public function up()
    {
        Schema::table('holidays', function (Blueprint $table) {
            $table->unsignedInteger('resource_code_id');
            $table->foreign('resource_code_id', 'resource_code_fk_1734144')->references('id')->on('resources');
        });
    }
}
