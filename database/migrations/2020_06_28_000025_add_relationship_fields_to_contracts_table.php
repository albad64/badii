<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToContractsTable extends Migration
{
    public function up()
    {
        Schema::table('contracts', function (Blueprint $table) {
            $table->unsignedInteger('resource_code_id');
            $table->foreign('resource_code_id', 'resource_code_fk_1728512')->references('id')->on('resources');
            $table->unsignedInteger('company_id')->nullable();
            $table->foreign('company_id', 'company_fk_1728515')->references('id')->on('companies');
            $table->unsignedInteger('report_resource_code_id')->nullable();
            $table->foreign('report_resource_code_id', 'report_resource_code_fk_1728530')->references('id')->on('resources');
        });
    }
}
