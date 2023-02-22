<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToHiringsTable extends Migration
{
    public function up()
    {
        Schema::table('hirings', function (Blueprint $table) {
            $table->unsignedBigInteger('construction_id')->nullable();
            $table->foreign('construction_id', 'construction_fk_7804940')->references('id')->on('constructions');
            $table->unsignedBigInteger('partner_id')->nullable();
            $table->foreign('partner_id', 'partner_fk_7804941')->references('id')->on('business_partners');
            $table->unsignedBigInteger('occupation_id')->nullable();
            $table->foreign('occupation_id', 'occupation_fk_7804943')->references('id')->on('occupations');
            $table->unsignedBigInteger('company_id')->nullable();
            $table->foreign('company_id', 'company_fk_7804945')->references('id')->on('companies');
        });
    }
}
