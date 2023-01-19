<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJob extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('create_job', function (Blueprint $table) {
            $table->id('id');
            $table->string('name')->nullable();
            $table->string('register_id')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('o_phone')->nullable();
            $table->string('organization')->nullable();
            $table->text('postal_address')->nullable();
            $table->string('website')->nullable();
            $table->text('multi_location')->nullable();
            $table->string('copy_advertisement')->nullable();
            $table->text('remarks')->nullable();
            $table->string('categories')->nullable();
            $table->string('subcategories')->nullable();
            $table->string('selection_job')->nullable();
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
        Schema::dropIfExists('create_job');
    }
}
