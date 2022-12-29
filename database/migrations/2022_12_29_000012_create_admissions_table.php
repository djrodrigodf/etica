<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdmissionsTable extends Migration
{
    public function up()
    {
        Schema::create('admissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('admission_date');
            $table->string('rg');
            $table->string('ctps');
            $table->string('serial')->nullable();
            $table->string('uf')->nullable();
            $table->string('gender');
            $table->date('birth');
            $table->string('naturalness')->nullable();
            $table->string('phone_contact')->nullable();
            $table->string('phone_message')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('spouse')->nullable();
            $table->date('spouse_birth')->nullable();
            $table->string('spouse_cpf')->nullable();
            $table->string('spouse_rg')->nullable();
            $table->string('children')->nullable();
            $table->integer('children_qtd')->nullable();
            $table->longText('dependent')->nullable();
            $table->string('mother')->nullable();
            $table->string('father')->nullable();
            $table->string('foreigner')->nullable();
            $table->longText('foreigner_metadata')->nullable();
            $table->string('education_level')->nullable();
            $table->string('level_education')->nullable();
            $table->string('other_courses')->nullable();
            $table->string('skin')->nullable();
            $table->string('special_need')->nullable();
            $table->longText('deficiency')->nullable();
            $table->string('relative')->nullable();
            $table->string('relative_name')->nullable();
            $table->string('relative_kinship')->nullable();
            $table->string('car')->nullable();
            $table->string('first_job')->nullable();
            $table->string('tshirt')->nullable();
            $table->string('pants')->nullable();
            $table->string('boot')->nullable();
            $table->string('bank')->nullable();
            $table->string('bank_account')->nullable();
            $table->string('bank_type')->nullable();
            $table->string('bank_agency')->nullable();
            $table->string('operation')->nullable();
            $table->string('pix')->nullable();
            $table->date('date_declaration')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
