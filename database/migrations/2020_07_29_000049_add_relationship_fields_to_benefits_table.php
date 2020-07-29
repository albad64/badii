<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToBenefitsTable extends Migration
{
    public function up()
    {
        Schema::table('benefits', function (Blueprint $table) {
            $table->unsignedInteger('resource_code_id');
            $table->foreign('resource_code_id', 'resource_code_fk_1734067')->references('id')->on('resources');
            $table->unsignedInteger('currency_id')->nullable();
            $table->foreign('currency_id', 'currency_fk_1734072')->references('id')->on('currencies');
            $table->unsignedInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_1756651')->references('id')->on('teams');
        });
    }
}
