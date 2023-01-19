<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamLeagueHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_league_histories', function (Blueprint $table) {
            $table->id();
            $table->integer('team_id')->unsigned()->nullable();
                $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
            
            $table->unsignedBigInteger('league_id')->nullable();
            $table->foreign('league_id')->references('id')->on('leagues')->onDelete('CASCADE');

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
        Schema::dropIfExists('team_league_histories');
    }
}
