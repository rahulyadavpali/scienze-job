<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbWebsites extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_websites', function (Blueprint $table) {
            $table->id('id');
            $table->string('name')->nullable();
            $table->string('link')->nullable();
            $table->string('logo')->nullable();
            $table->enum('status', [0, 1])->default(1)->comment('1=active, 0=inactive');
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
        Schema::dropIfExists('tb_websites');
    }
}
