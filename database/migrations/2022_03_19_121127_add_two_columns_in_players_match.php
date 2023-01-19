<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTwoColumnsInPlayersMatch extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('player_in_team_for_matches', function (Blueprint $table) {
            $table->json('innings')->nullable()->after('team_b');
            $table->json('commentry')->nullable()->after('innings');
            $table->integer('progress_status')->comment('0=Not Started, 1=In Progress, 2=Finished')->default(0)->after('commentry');
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
                'innings',
                'commentry',
                'progress_status'
            ]);
        });
    }
}
