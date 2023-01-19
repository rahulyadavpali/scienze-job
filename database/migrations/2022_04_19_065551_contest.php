<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Contest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('contest', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('contest_title')->nullable();
        //     $table->string('contest_fee')->nullable();
        //     $table->string('feature_img')->nullable();
        //     // $table->string('contest_img')->nullable();
        //     $table->string('projected_prize_first')->nullable();
        //     $table->string('projected_prize_second')->nullable();
        //     $table->string('projected_prize_third')->nullable();
        //     $table->string('guarnteed_prize_first')->nullable();
        //     $table->string('guarnteed_prize_second')->nullable();
        //     $table->string('guarnteed_prize_third')->nullable();
        //     $table->string('final_prize_first')->nullable();
        //     $table->string('final_prize_second')->nullable();
        //     $table->string('final_prize_third')->nullable();
        //     $table->date('entire_open_date')->nullable();
        //     $table->date('entire_close_date')->nullable();
        //     $table->date('contest_open_date')->nullable();
        //     $table->date('contest_close_date')->nullable();
        //     $table->string('meta_title')->nullable();
        //     $table->string('meta_description')->nullable();
        //     $table->string('contest_type')->default(0);
        //     $table->enum('contest_status', [0, 1])->default(1)->comment('1= active, 0=inactive');
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
        Schema::drop('contest');
    }
}
