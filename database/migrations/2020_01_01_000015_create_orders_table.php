<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('sales_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('sales_order');
            $table->date('order_date');
            $table->integer('client_code')->nullable()->unsigned();
            $table->string('payment', 4);
            $table->string('quotation', 10)->nullable();
            $table->string('customer_ref', 50);
            $table->unsignedSmallInteger('order_position');
            $table->unsignedSmallInteger('quantity');
            $table->string('measure', 4);
            $table->string('part_number', 20)->nullable();
            $table->decimal('order_value', 10, 2);
            $table->string('currency', 3);
            $table->string('creator', 15);
            $table->string('status', 2);
            $table->string('rejection', 2)->nullable();
            $table->timestamps();

            $table->foreign('client_code')->references('code')->on('customers')
                ->onUpdate('cascade')
                ->onDelete('set null');
            
            $table->foreign('part_number')->references('part_number')->on('parts')
                ->onUpdate('cascade')
                ->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('sales_orders');
    }
}