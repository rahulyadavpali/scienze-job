<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('match_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('match_id');

            $table->json('commentry')->nullable();
            $table->json('bats_data')->nullable();
            $table->json('bowler_data')->nullable();

            $table->enum('status', [0, 1])->default(1)->comment('1= active, 0=inactive');
            $table->integer('log_id')->default(1);
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
        Schema::dropIfExists('match_details');
    }
}
