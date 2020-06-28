<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToResourcesTable extends Migration
{
    public function up()
    {
        Schema::table('resources', function (Blueprint $table) {
            $table->unsignedInteger('birth_country_id')->nullable();
            $table->foreign('birth_country_id', 'birth_country_fk_1728337')->references('id')->on('countries');
            $table->unsignedInteger('address_country_id')->nullable();
            $table->foreign('address_country_id', 'address_country_fk_1728359')->references('id')->on('countries');
            $table->unsignedInteger('alt_address_country_id')->nullable();
            $table->foreign('alt_address_country_id', 'alt_address_country_fk_1734180')->references('id')->on('countries');
        });
    }
}
