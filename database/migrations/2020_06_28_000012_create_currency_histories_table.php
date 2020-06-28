<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrencyHistoriesTable extends Migration
{
    public function up()
    {
        Schema::create('currency_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date_validity');
            $table->float('conversion_rate', 15, 6)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
