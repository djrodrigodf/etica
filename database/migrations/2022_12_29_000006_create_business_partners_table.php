<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessPartnersTable extends Migration
{
    public function up()
    {
        Schema::create('business_partners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('company_name')->nullable();
            $table->string('cnpj_cpf')->unique();
            $table->string('ie')->unique()->nullable();
            $table->string('phone');
            $table->string('email');
            $table->string('zip_code');
            $table->string('address');
            $table->string('number');
            $table->string('complement')->nullable();
            $table->string('district');
            $table->string('city');
            $table->string('state');
            $table->string('country')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
