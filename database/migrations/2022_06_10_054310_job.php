<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Job extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('tb_job', function (Blueprint $table) {
        //     $table->id('id');
        //     $table->string('company_name')->nullable();
        //     $table->string('company_link')->nullable();
        //     $table->string('company_logo')->nullable();
        //     $table->string('job_title')->nullable();
        //     $table->string('job_time')->nullable();
        //     $table->string('date_posted')->nullable();
        //     $table->string('hours')->nullable();
        //     $table->string('salary')->nullable();
        //     $table->string('category')->nullable();
        //     $table->text('job_decription')->nullable();
        //     $table->text('min_qualification')->nullable();
        //     $table->text('how_tp_apply')->nullable();
        //     $table->string('meta_title')->nullable();
        //     $table->text('meta_description')->nullable();
        //     $table->enum('status', [0, 1])->default(1)->comment('1=active, 0=inactive');
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
        Schema::drop('tb_job');
    }
}
