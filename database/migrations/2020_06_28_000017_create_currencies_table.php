<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrenciesTable extends Migration
{
    public function up()
    {
        Schema::create('currencies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->unique();
            $table->string('description');
            $table->string('symbol');
            $table->integer('order_number')->nullable();
            $table->integer('decimal_digits')->nullable();
            $table->string('suite')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
