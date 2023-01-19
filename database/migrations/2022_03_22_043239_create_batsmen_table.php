<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBatsmenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batsmen', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('match_id')->index();
            
            $table->unsignedBigInteger('player_id')->index();

            $table->integer('runs')->nullable();
            $table->integer('six')->default(0)->comment('0=false, 1=true');
            $table->integer('four')->default(0)->comment('0=false, 1=true');
            $table->integer('dots')->default(0)->comment('0=false');
            $table->integer('no_ball')->deafult(0);
            $table->integer('wide_ball')->deafult(0);
            $table->integer('bye')->default(0);
            $table->integer('total_balls')->default(0);

            $table->integer('dismissal')->default(0)->comment('0=false, 1=true');
            $table->text('dismissal_type')->nullable();
            $table->integer('dismissal_bowler')->default(0)->comment('0=false');
            $table->integer('dismissal_fielder')->default(0)->comment('0=false');

            $table->json('run_cordinate')->nullable();
            
            $table->integer('strike')->default(1)->comment('1=true, 2=false');
            $table->integer('strike_rate')->default(0)->comment('0=false');
            
            $table->integer('retired')->default(0)->comment('0=false, 1=true');
            $table->string('retired_type')->nullable();
            $table->integer('innings')->default(1);

            $table->enum('status', [0, 1])->default(1)->comment('1= active, 0=inactive');
            $table->integer('log_id')->default(1);
            $table->timestamps();

            // $table->foreign('match_id')->references('id')->on('games')->onDelete('cascade');
            // $table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('batsmen');
    }
}
