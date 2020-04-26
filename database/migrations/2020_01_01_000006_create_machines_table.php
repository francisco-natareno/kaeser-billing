<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMachinesTable extends Migration
{
    public function up()
    {
        Schema::create('machines', function (Blueprint $table) {
            $table->increments('id');
            $table->string('material', 20);
            $table->string('serial', 20);
            $table->unsignedInteger('emr')->unique();
            $table->string('description', 50);
            $table->smallInteger('year');
            $table->string('category', 15)->nullable();
            $table->string('denomination', 10)->nullable();
            $table->string('model', 10)->nullable();
            $table->integer('client_code')->nullable()->unsigned();
            $table->smallInteger('sales_org');
            $table->date('wty_client')->nullable();
            $table->date('start_up')->nullable();
            $table->string('identification', 50)->nullable();
            $table->timestamps();

            $table->foreign('client_code')->references('code')->on('customers')
                ->onUpdate('cascade')
                ->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('machines');
    }
}