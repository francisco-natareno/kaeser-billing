<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('contract');
            $table->date('sap_date');
            $table->string('header', 25);
            $table->string('internal_ref', 150);
            $table->smallInteger('salesperson')->unsigned()->nullable();
            $table->string('sales_channel', 2);
            $table->string('invoice_description', 150);
            $table->integer('client_code')->unsigned()->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->decimal('value', 10, 2);
            $table->string('currency', 3);
            $table->string('creator', 15);
            $table->string('payment', 4);
            $table->timestamps();

            $table->foreign('salesperson')->references('salesperson_id')->on('sales_representatives')
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->foreign('client_code')->references('code')->on('customers')
                ->onUpdate('cascade')
                ->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('contracts');
    }
}