<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBowlersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bowlers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('match_id')->index();
            
            $table->unsignedBigInteger('player_id')->index();

            $table->integer('runs')->nullable();
            $table->integer('no_ball')->deafult(0);
            $table->integer('wide_ball')->deafult(0);
            $table->integer('six')->default(0)->comment('0=false, 1=true');
            $table->integer('four')->default(0)->comment('0=false, 1=true');
            $table->integer('dots')->default(0)->comment('0=false');
            $table->integer('bye')->default(0);
            $table->integer('total_balls')->default(0);

            $table->integer('wickets')->default(0);
            $table->integer('over_status')->default(1);

            $table->json('total_wickets')->nullable();
            $table->json('pitch_cordinate')->nullable();

            $table->integer('retired')->default(0)->comment('0=false, 1=true');
            $table->string('retired_type')->nullable();
            $table->integer('innings')->default(1);

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
        Schema::dropIfExists('bowlers');
    }
}
