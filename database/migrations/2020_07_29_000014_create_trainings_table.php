<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingsTable extends Migration
{
    public function up()
    {
        Schema::create('trainings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_number');
            $table->string('training_supplier')->nullable();
            $table->string('training_location')->nullable();
            $table->string('training_description')->nullable();
            $table->integer('training_year')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
