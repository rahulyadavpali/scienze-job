<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbEmployer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_employer', function (Blueprint $table) {
            $table->id('id');
            $table->string('role_id')->nullable();
            $table->string('prefix')->nullable();
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('whatsapp_number')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_website')->nullable();
            $table->text('company_description')->nullable();
            $table->string('company_logo')->nullable();
            $table->text('company_address')->nullable();
            $table->string('zip_code')->nullable();
            $table->text('company_location')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('facebook')->nullable();
            $table->string('string')->nullable();
            $table->string('accept_terms')->nullable();
            $table->enum('required', [0, 1])->default(1)->comment('1=active, 0=inactive');
            $table->enum('status', [0, 1])->default(1)->comment('1=active, 0=inactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_employer');
    }
}
