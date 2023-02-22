<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConstructionsTable extends Migration
{
    public function up()
    {
        Schema::create('constructions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('project_mega')->nullable();
            $table->string('name');
            $table->string('public_agency')->nullable();
            $table->string('situation')->nullable();
            $table->string('work_group')->nullable();
            $table->string('copartner')->nullable();
            $table->float('iss', 5, 2)->nullable();
            $table->float('tax', 5, 2)->nullable();
            $table->float('partner_percentage', 5, 2)->nullable();
            $table->string('role')->nullable();
            $table->float('administration_fee', 5, 2)->nullable();
            $table->decimal('reserve_fund', 15, 2)->nullable();
            $table->string('public_notice_number')->nullable();
            $table->float('average_discount', 5, 2)->nullable();
            $table->date('budget_base_date')->nullable();
            $table->date('proposal_base_date')->nullable();
            $table->date('use_base_date')->nullable();
            $table->decimal('contract_value', 15, 2)->nullable();
            $table->string('type')->nullable();
            $table->string('contract_number')->nullable();
            $table->date('contract_publication_date')->nullable();
            $table->string('deadline_contract')->nullable();
            $table->date('start_order_date')->nullable();
            $table->string('cei_registration')->nullable();
            $table->string('cnpj_branch')->nullable();
            $table->decimal('policy_value', 15, 2)->nullable();
            $table->string('construction_site_city')->nullable();
            $table->string('site_address')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
