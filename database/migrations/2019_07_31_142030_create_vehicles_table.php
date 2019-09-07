<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('owner_id');
            $table->string('registration_number');
            $table->date('registration_date');
            $table->string('type');
            $table->string('body');
            $table->string('engine_number');
            $table->string('chassis_number');
            $table->string('capacity');
            $table->string('address_1');
            $table->string('address_2')->nullable();
            $table->string('address_3')->nullable();
            $table->string('landmark')->nullable();
            $table->unsignedInteger('country_id');
            $table->unsignedInteger('state_id');
            $table->unsignedInteger('city_id');
            $table->string('pin', 9);
            $table->string('mobile_number', 15)->nullable();
            $table->string('alternate_number', 15)->nullable();
            $table->string('created_by');
            $table->string('updated_by')->nullable();
            $table->timestamps();

            $table->foreign('country_id')->references('id')->on('countries')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('state_id')->references('id')->on('states')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('owner_id')->references('id')->on('vehicle_owners')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
}
