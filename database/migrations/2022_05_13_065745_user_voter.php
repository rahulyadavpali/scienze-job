<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserVoter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('user_voter', function (Blueprint $table) {
        //     $table->id('id');
        //     $table->string('first_name')->nullable();
        //     $table->string('surname')->nullable();
        //     $table->string('email')->nullable();
        //     $table->string('password')->nullable();
        //     $table->string('zip_code')->nullable();
        //     $table->int('role_id')->nullable();
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
        Schema::dropIfExists('user_voter');
    }
}
