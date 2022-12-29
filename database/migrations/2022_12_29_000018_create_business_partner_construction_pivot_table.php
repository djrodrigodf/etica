<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessPartnerConstructionPivotTable extends Migration
{
    public function up()
    {
        Schema::create('business_partner_construction', function (Blueprint $table) {
            $table->unsignedBigInteger('construction_id');
            $table->foreign('construction_id', 'construction_id_fk_7804984')->references('id')->on('constructions')->onDelete('cascade');
            $table->unsignedBigInteger('business_partner_id');
            $table->foreign('business_partner_id', 'business_partner_id_fk_7804984')->references('id')->on('business_partners')->onDelete('cascade');
        });
    }
}
