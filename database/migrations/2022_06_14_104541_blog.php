<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Blog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('tb_blog', function (Blueprint $table) {
        //     $table->id('id');
        //     $table->string('title')->nullable();
        //     $table->string('posting_date')->nullable();
        //     $table->string('category')->nullable();
        //     $table->string('feature_img')->nullable();
        //     $table->text('description')->nullable();
        //     $table->string('author_name')->nullable();
        //     $table->text('author_comment')->nullable();
        //     $table->text('meta_title')->nullable();
        //     $table->text('meta_description')->nullable();
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
        Schema::drop('tb_blog');
    }
}
