<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbJobseeker extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_jobseeker', function (Blueprint $table) {
            $table->id('id');
            $table->string('role_id')->nullable();
            $table->string('prefix')->nullable();
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('dob')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('other_number')->nullable();
            $table->string('photo')->nullable();
            $table->string('resume')->nullable();
            $table->text('description')->nullable();
            $table->text('presernt_work')->nullable();
            $table->string('exp_salary')->nullable();
            $table->text('address')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('categories')->nullable();
            $table->string('subcategories')->nullable();
            $table->string('selection_job')->nullable();
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
        Schema::dropIfExists('tb_jobseeker');
    }
}
