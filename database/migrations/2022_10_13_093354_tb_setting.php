<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbSetting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_setting', function (Blueprint $table) {
            $table->id('id');
            $table->string('type')->nullable();
            $table->string('field')->nullable();
            $table->string('getfield')->nullable();
            $table->string('title')->nullable();
            $table->string('value')->nullable();
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
        Schema::dropIfExists('tb_setting');
    }
}
