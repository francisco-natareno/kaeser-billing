<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesRepresentativesTable extends Migration
{
    public function up()
    {
        Schema::create('sales_representatives', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('salesperson_id')->unsigned()->unique();
            $table->string('first_name', 25);
            $table->string('last_name', 25);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sales_representatives');
    }
}