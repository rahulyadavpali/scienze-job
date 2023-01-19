<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Gallery extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('gallery', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('contest_id')->nullable();
        //     $table->string('image')->nullable();
        //     $table->string('feature')->nullable();
        //     $table->string('alt_tag')->nullable();
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
        Schema::drop('gallery');
    }
}
