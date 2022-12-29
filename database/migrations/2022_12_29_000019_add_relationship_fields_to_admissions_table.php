<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAdmissionsTable extends Migration
{
    public function up()
    {
        Schema::table('admissions', function (Blueprint $table) {
            $table->unsignedBigInteger('company_id')->nullable();
            $table->foreign('company_id', 'company_fk_7804740')->references('id')->on('companies');
            $table->unsignedBigInteger('construction_id')->nullable();
            $table->foreign('construction_id', 'construction_fk_7804741')->references('id')->on('constructions');
            $table->unsignedBigInteger('partner_id')->nullable();
            $table->foreign('partner_id', 'partner_fk_7804742')->references('id')->on('business_partners');
            $table->unsignedBigInteger('occupation_id')->nullable();
            $table->foreign('occupation_id', 'occupation_fk_7804743')->references('id')->on('occupations');
            $table->unsignedBigInteger('salary_id')->nullable();
            $table->foreign('salary_id', 'salary_fk_7804744')->references('id')->on('salaries');
        });
    }
}
