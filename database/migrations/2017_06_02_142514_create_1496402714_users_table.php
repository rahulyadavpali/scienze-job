<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1496402714UsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->text('username');
                $table->string('email');
                $table->timestamp('email_verified_at')->nullable();
                $table->string('password');
                $table->enum('status', [0, 1])->default(1)->comment('1= active, 0=inactive');
                $table->integer('role_id')->unsigned()->nullable();
                $table->foreign('job_id', '41905_59314b1a6c90f')->references('id')->on('roles')->onDelete('cascade');
                $table->string('password');
                $table->string('remember_token')->nullable();
                
                $table->timestamps();
                
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
