<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('porters', function (Blueprint $table) {
            $table->id('id');
            $table->string('name');
            $table->string('name_mother');
            $table->string('place_birth');
            $table->date('data_birth');
            $table->string('phone');
            $table->double('national_number');
            $table->text('residence');
            $table->string('picture');
            $table->string('number_box');
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
        Schema::dropIfExists('porters');
    }
}
