<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbJobs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_jobs', function (Blueprint $table) {
            $table->id('id');
            $table->string('user_id')->nullable();
            $table->string('employer_id')->nullable();
            $table->string('email')->nullable();
            $table->string('company_name')->nullable();
            $table->string('job_title')->nullable();
            $table->string('post_no')->nullable();
            $table->string('location')->nullable();
            $table->text('expectation')->nullable();
            $table->string('copy')->nullable();
            $table->text('remarks')->nullable();
            $table->text('salary')->nullable();
            $table->string('categories')->nullable();
            $table->text('subcategories')->nullable();
            $table->string('selection_job')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
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
        Schema::dropIfExists('tb_jobs');
    }
}
