<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbUserApply extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('tb_user_apply', function (Blueprint $table) {
        //     $table->id('id');
        //     $table->string('job_id')->nullable();
        //     $table->string('apply_id')->nullable();
        //     $table->string('name')->nullable();
        //     $table->string('email')->nullable();
        //     $table->text('password')->nullable();
        //     $table->string('role_id')->nullable();
        //     $table->text('remember_token')->nullable();
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
        Schema::drop('tb_user_apply');
    }
}
