<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable()->unique();
            $table->string('short_code')->nullable();
            $table->string('region')->nullable();
            $table->string('country_kpi')->nullable();
            $table->timestamps();
        });
    }
}
