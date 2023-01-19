<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClubLeagueHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('club_league_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('club_id')->nullable();
            $table->foreign('club_id')->references('id')->on('clubs')->onDelete('CASCADE');

            $table->unsignedBigInteger('league_id')->nullable();
            $table->foreign('league_id')->references('id')->on('leagues')->onDelete('CASCADE');

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
        Schema::dropIfExists('club_league_histories');
    }
}
