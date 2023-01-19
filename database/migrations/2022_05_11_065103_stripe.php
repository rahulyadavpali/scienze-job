<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Stripe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('strip', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->unsignedInteger('contest_id')->nullable();
        //     $table->string('contestant_name')->nullable();
        //     $table->string('description')->nullable();
        //     $table->string('payment_amount')->nullable();
        //     $table->integer('payment_status')->nullable();
        //     $table->timestamp('payment_time')->nullable();
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
        Schema::drop('strip');
    }
}
