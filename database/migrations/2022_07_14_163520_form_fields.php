<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FormFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_fields', function (Blueprint $table) {
            $table->id('id');
            $table->string('form_id')->nullable();
            $table->string('form_label')->nullable();
            $table->string('field_type')->nullable();
            $table->string('field_name')->nullable();
            $table->string('field_id')->nullable();
            $table->string('placeholder')->nullable();
            $table->enum('required', [0, 1])->default(1)->comment('1=active, 0=inactive');
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
        Schema::dropIfExists('form_fields');
    }
}
