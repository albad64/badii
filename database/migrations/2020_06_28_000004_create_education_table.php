<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationTable extends Migration
{
    public function up()
    {
        Schema::create('education', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_number');
            $table->integer('graduated_year');
            $table->string('education_level');
            $table->string('education_area')->nullable();
            $table->string('education_location')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
