<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTwoColumnInTeamPlayerHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('player_in_team_for_matches', function (Blueprint $table) {
            $table->integer('team_a_captain_id')->nullable()->after('team_b');
            $table->integer('team_a_wicket_keeper_id')->nullable()->after('team_a_captain_id');

            $table->integer('team_b_captain_id')->nullable()->after('team_a_wicket_keeper_id');
            $table->integer('team_b_wicket_keeper_id')->nullable()->after('team_b_captain_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('player_in_team_for_matches', function (Blueprint $table) {
            $table->dropColumn([
                'team_a_captain_id',
                'team_a_wicket_keeper_id',
                'team_b_captain_id',
                'team_b_wicket_keeper_id'
            ]);
        });
    }
}
