<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consignments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('consignor_id');
            $table->unsignedBigInteger('consignee_id');
            $table->string('risk');
            $table->string('pay_basis');
            $table->string('mod');
            $table->string('service_type');
            $table->string('gst_paid_by');
            $table->string('remarks')->nullable();
            $table->string('vehicle_number');
            $table->string('vehicle_type');
            $table->boolean('billing')->default(0);
            $table->string('created_by');
            $table->string('updated_by')->nullable();

            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('consignor_id')->references('id')->on('consignors')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('consignee_id')->references('id')->on('consignees')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consignments');
    }
}
