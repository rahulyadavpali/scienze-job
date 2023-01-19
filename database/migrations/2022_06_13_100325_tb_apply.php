<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbApply extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('tb_apply', function (Blueprint $table) {
        //     $table->id('id');
        //     $table->string('job_id')->nullable();
        //     $table->string('full_name')->nullable();
        //     $table->string('father_name')->nullable();
        //     $table->string('phone')->nullable();
        //     $table->string('email')->nullable();
        //     $table->string('qualification')->nullable();
        //     $table->string('experience')->nullable();
        //     $table->string('last_work')->nullable();
        //     $table->string('address')->nullable();
        //     $table->string('state')->nullable();
        //     $table->string('city')->nullable();
        //     $table->string('zip_code')->nullable();
        //     $table->string('image')->nullable();
        //     $table->string('resume')->nullable();
        //     $table->enum('status', [0, 1])->default(1)->comment('1=active, 0=inactive');
        //     $table->string('role_id')->nullable();
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tb_apply');
    }
}
