<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Voters extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('voters', function (Blueprint $table) {
        //     $table->id('id');
        //     $table->string('contest_id')->nullable();
        //     $table->string('registration_id')->nullable();
        //     $table->string('voter_id')->nullable();
        //     $table->enum('status', [0, 1])->default(1)->comment('1=active, 0=inactive');
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
        Schema::drop('voters');
    }
}
