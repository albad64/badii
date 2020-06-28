<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresentationsTable extends Migration
{
    public function up()
    {
        Schema::create('presentations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_number');
            $table->string('event_host')->nullable();
            $table->string('event_name')->nullable();
            $table->string('event_location')->nullable();
            $table->integer('event_year')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
