<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPmpDetailsTable extends Migration
{
    public function up()
    {
        Schema::table('pmp_details', function (Blueprint $table) {
            $table->unsignedInteger('pmp_id')->nullable();
            $table->foreign('pmp_id', 'pmp_fk_1734351')->references('id')->on('pmps');
        });
    }
}
