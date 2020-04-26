<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('code')->unique();
            $table->string('name', 100);
            $table->string('street_1', 100)->nullable();
            $table->string('street_2', 100)->nullable();
            $table->string('postal_code', 6)->nullable();
            $table->string('localization', 50)->nullable();
            $table->string('tax_id', 12)->nullable();
            $table->smallInteger('salesperson')->unsigned()->nullable();
            $table->string('coordinator', 25)->nullable();
            $table->timestamps();

            $table->foreign('salesperson')->references('salesperson_id')->on('sales_representatives')
                ->onUpdate('cascade')
                ->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('customers');
    }
}