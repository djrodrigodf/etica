<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThirdPartyRegistrationsTable extends Migration
{
    public function up()
    {
        Schema::create('third_party_registrations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('contract')->nullable();
            $table->date('date_start');
            $table->date('date_end');
            $table->string('accommodation')->nullable();
            $table->string('food')->nullable();
            $table->string('epi')->nullable();
            $table->string('transport')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
