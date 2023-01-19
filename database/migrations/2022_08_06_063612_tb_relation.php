<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbRelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('tb_jobtype', function (Blueprint $table) {
        //     $table->id('id');
        //     $table->string('seeker_id')->nullable();
        //     $table->string('taget_id')->nullable();
        //     $table->string('seeker_id')->nullable();
        //     $table->string('seeker_id')->nullable();
        //     $table->string('seeker_id')->nullable();
        //     $table->string('seeker_id')->nullable();
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
        Schema::dropIfExists('tb_relation');
    }
}
