<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLanguagesTable extends Migration
{
    public function up()
    {
        Schema::create('languages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('language_name');
            $table->string('fluency_level')->nullable();
            $table->string('certificate_level')->nullable();
            $table->string('year_level')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
