<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHolidaysTable extends Migration
{
    public function up()
    {
        Schema::create('holidays', function (Blueprint $table) {
            $table->increments('id');
            $table->string('holidays_type');
            $table->integer('holiday_year');
            $table->integer('holiday_month');
            $table->float('holiday_residual', 15, 2)->nullable();
            $table->float('holiday_actual', 15, 2)->nullable();
            $table->float('holiday_enjoyed', 15, 2)->nullable();
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
