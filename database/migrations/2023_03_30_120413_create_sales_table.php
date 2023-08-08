<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{

    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id('id');
            $table->string('Borrow_Type');
            $table->integer('Price');
            $table->foreignId('proter_id')->constrained('porters')->CascadeOnDelete();
            $table->foreignId('straple_id')->constrained('straples')->CascadeOnDelete();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
