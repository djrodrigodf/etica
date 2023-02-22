<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHiringsTable extends Migration
{
    public function up()
    {
        Schema::create('hirings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date_birth')->nullable();
            $table->decimal('salary', 15, 2);
            $table->string('capacity')->nullable();
            $table->date('beginning')->nullable();
            $table->date('finish')->nullable();
            $table->string('clt')->nullable();
            $table->string('registration')->nullable();
            $table->decimal('health_plan', 15, 2)->nullable();
            $table->decimal('vehicle_rental', 15, 2)->nullable();
            $table->decimal('laptop_rental', 15, 2)->nullable();
            $table->decimal('phone_plan', 15, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
