<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCurrencyHistoriesTable extends Migration
{
    public function up()
    {
        Schema::table('currency_histories', function (Blueprint $table) {
            $table->unsignedInteger('currency_id');
            $table->foreign('currency_id', 'currency_fk_1728234')->references('id')->on('currencies');
        });
    }
}
