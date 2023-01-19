<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Registration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('registration', function (Blueprint $table) {
        //     $table->id('id');
        //     $table->string('contest_id')->nullable();
        //     $table->string('first_name')->nullable();
        //     $table->string('surname')->nullable();
        //     $table->string('email')->nullable();
        //     $table->string('password')->nullable();
        //     $table->string('zip_code')->nullable();
        //     $table->string('image')->nullable();
        //     $table->int('role_id')->nullable();
        //     $table->string('fee')->nullable();
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
        Schema::drop('registration');
    }
}
