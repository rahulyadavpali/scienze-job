<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_category', function (Blueprint $table) {
            $table->id('id');
            $table->string('parent_id')->nullable();
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->string('logo')->nullable();
            $table->string('meta_tag')->nullable();
            $table->string('meta_keyword')->nullable();
            $table->string('meta_description')->nullable();
            $table->enum('status', [0, 1])->default(1)->comment('1=active, 0=inactive');
            $table->enum('is_deleted', [0, 1])->default(1)->comment('1=active, 0=inactive');
            $table->enum('is_home', [0, 1])->default(1)->comment('1=active, 0=inactive');
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
        Schema::dropIfExists('tb_category');
    }
}
