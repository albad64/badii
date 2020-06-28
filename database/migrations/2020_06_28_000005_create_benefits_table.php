<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBenefitsTable extends Migration
{
    public function up()
    {
        Schema::create('benefits', function (Blueprint $table) {
            $table->increments('id');
            $table->string('benefit_extra_type')->nullable();
            $table->string('benefit_type')->nullable();
            $table->date('assigned_date');
            $table->date('expired_date')->nullable();
            $table->decimal('total_cost', 15, 2)->nullable();
            $table->decimal('optional_value', 15, 2)->nullable();
            $table->decimal('fringe_benefit', 15, 2)->nullable();
            $table->longText('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
