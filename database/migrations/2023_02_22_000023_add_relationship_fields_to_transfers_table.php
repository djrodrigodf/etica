<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTransfersTable extends Migration
{
    public function up()
    {
        Schema::table('transfers', function (Blueprint $table) {
            $table->unsignedBigInteger('obra_id')->nullable();
            $table->foreign('obra_id', 'obra_fk_8072390')->references('id')->on('constructions');
            $table->unsignedBigInteger('business_partner_id')->nullable();
            $table->foreign('business_partner_id', 'business_partner_fk_8072391')->references('id')->on('business_partners');
        });
    }
}
