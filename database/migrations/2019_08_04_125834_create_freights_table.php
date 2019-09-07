<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFreightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('freights', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('consignment_id');
            $table->unsignedDecimal('basic');
            $table->unsignedDecimal('handling');
            $table->unsignedDecimal('delivery');
            $table->unsignedDecimal('enroute');
            $table->unsignedDecimal('loading');
            $table->unsignedDecimal('unloading');
            $table->unsignedDecimal('misc');
            $table->unsignedDecimal('total');
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
        Schema::dropIfExists('freights');
    }
}
