<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbReview extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_review', function (Blueprint $table) {
            $table->id('id');
            $table->string('employer_id')->nullable();
            $table->string('name')->nullable();
            $table->string('image')->nullable();
            $table->text('review_text')->nullable();
            $table->string('role_type')->nullable();
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
        Schema::dropIfExists('tb_review');
    }
}
