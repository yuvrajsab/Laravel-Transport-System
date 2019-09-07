<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('consignment_id');
            $table->string('number');
            $table->date('date');
            $table->unsignedInteger('hsn')->nullable();
            $table->string('ewaybill_number', 12)->nullable();
            $table->date('ewaybill_date')->nullable();            
            $table->unsignedDecimal('ack_weight')->nullable();
            $table->unsignedDecimal('chrg_weight')->nullable();
            $table->text('desc')->nullable();
            $table->unsignedSmallInteger('nop')->nullable();
            $table->string('pkt_type')->nullable();
            $table->unsignedDecimal('value');
            $table->timestamps();

            $table->foreign('consignment_id')->references('id')->on('consignments')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
