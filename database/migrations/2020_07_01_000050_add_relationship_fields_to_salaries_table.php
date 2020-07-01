<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSalariesTable extends Migration
{
    public function up()
    {
        Schema::table('salaries', function (Blueprint $table) {
            $table->unsignedInteger('resource_code_id');
            $table->foreign('resource_code_id', 'resource_code_fk_1728537')->references('id')->on('resources');
            $table->unsignedInteger('work_country_id')->nullable();
            $table->foreign('work_country_id', 'work_country_fk_1728541')->references('id')->on('countries');
            $table->unsignedInteger('currency_id')->nullable();
            $table->foreign('currency_id', 'currency_fk_1728551')->references('id')->on('currencies');
            $table->unsignedInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_1756648')->references('id')->on('teams');
        });
    }
}
