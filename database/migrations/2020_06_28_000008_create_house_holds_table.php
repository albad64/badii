<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHouseHoldsTable extends Migration
{
    public function up()
    {
        Schema::create('house_holds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('prog')->nullable();
            $table->string('relationship_type')->nullable();
            $table->string('relative_first_name')->nullable();
            $table->string('relative_last_name')->nullable();
            $table->float('percentage_charged', 15, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
