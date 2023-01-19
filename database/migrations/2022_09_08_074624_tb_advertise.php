<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbAdvertise extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_advertise', function (Blueprint $table) {
            $table->id('id');
            $table->string('user_id')->nullable();
            $table->string('user_email')->nullable();
            $table->string('plan_id')->nullable();
            $table->string('plan_name')->nullable();
            $table->string('name')->nullable();
            $table->string('link')->nullable();
            $table->string('image')->nullable();
            $table->string('accept_terms')->nullable();
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
        Schema::dropIfExists('tb_advertise');
    }
}
