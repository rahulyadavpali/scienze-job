<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Sponser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('sponser', function (Blueprint $table) {
        //     $table->id('id');
        //     $table->string('contest_id')->nullable();
        //     $table->string('s_name')->nullable();
        //     $table->string('link')->nullable();
        //     $table->string('image')->nullable();
        //     $table->string('alt_tag')->nullable();
        //     $table->string('position')->nullable();
        //     $table->string('status')->nullable();
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
        Schema::dropIfExists('sponser');
    }
}
