<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutlaysTable extends Migration
{

    public function up()
    {
        Schema::create('outlays', function (Blueprint $table) {
            $table->id();
            $table->text('note');
            $table->float('price');
            $table->integer('user_id');
            $table->integer('worker_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('outlays');
    }
}
