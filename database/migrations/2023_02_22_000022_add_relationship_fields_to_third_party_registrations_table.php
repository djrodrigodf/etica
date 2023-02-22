<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToThirdPartyRegistrationsTable extends Migration
{
    public function up()
    {
        Schema::table('third_party_registrations', function (Blueprint $table) {
            $table->unsignedBigInteger('partner_id')->nullable();
            $table->foreign('partner_id', 'partner_fk_7805008')->references('id')->on('business_partners');
            $table->unsignedBigInteger('construction_id')->nullable();
            $table->foreign('construction_id', 'construction_fk_7805009')->references('id')->on('constructions');
            $table->unsignedBigInteger('occupation_id')->nullable();
            $table->foreign('occupation_id', 'occupation_fk_7805011')->references('id')->on('occupations');
        });
    }
}
