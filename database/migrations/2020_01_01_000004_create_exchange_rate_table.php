<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExchangeRateTable extends Migration
{
    public function up()
    {
        Schema::create('exchange_rate', function (Blueprint $table) {
            $table->increments('id');
            $table->date('exchange_date');
            $table->decimal('tcr', 6, 5);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('exchange_rate');
    }
}