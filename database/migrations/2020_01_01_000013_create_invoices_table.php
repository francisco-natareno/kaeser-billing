<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('invoice');
            $table->date('billing_date');
            $table->integer('client_code')->nullable()->unsigned();
            $table->string('class', 4);
            $table->string('sales_channel', 2);
            $table->string('type', 1);
            $table->string('doc', 1);
            $table->string('sap_status', 1)->nullable();
            $table->decimal('value', 10, 2);
            $table->decimal('tax', 10, 2);
            $table->string('currency', 3);
            $table->string('creator', 20);
            $table->enum('status', ['created','cancelled','transfered','delivered','accounted'])->default('created');
            $table->string('sap_user', 20)->nullable();
            $table->date('cancel_date')->nullable();
            $table->date('transfer_date')->nullable();
            $table->date('delivered_date')->nullable();
            $table->timestamps();

            $table->foreign('client_code')->references('code')->on('customers')
                ->onUpdate('cascade')
                ->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('invoices');
    }
}