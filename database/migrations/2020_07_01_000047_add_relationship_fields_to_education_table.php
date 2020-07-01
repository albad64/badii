<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToEducationTable extends Migration
{
    public function up()
    {
        Schema::table('education', function (Blueprint $table) {
            $table->unsignedInteger('resource_code_id');
            $table->foreign('resource_code_id', 'resource_code_fk_1734124')->references('id')->on('resources');
        });
    }
}
