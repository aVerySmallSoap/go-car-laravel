<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pretripReceipts', function (Blueprint $table) {
            $table->id('pretrip_ID');
            $table->string('agent_name');
            $table->string('customer_name');
            $table->string('vehicle_type');
            $table->string('vehicle_plateNo');
            $table->string('pretrip_typeOfID');
            $table->dateTime('pretrip_datestart')->index('pretrip_datestart_index');
            $table->dateTime('pretrip_dateend')->index('pretrip_dateend_index');
            $table->string('pretrip_destination')->index('pretrip_destination_index');
            $table->double('pretrip_destinationPrice');
            $table->integer('pretrip_initialGas');
            $table->integer('pretrip_requestGasLiters');
            $table->integer('pretrip_requestGasPrice');
            $table->boolean('pretrip_requestWash');
            $table->boolean('pretrip_requestHelmet');
            $table->float('pretrip_total');
            $table->dateTime('pretrip_createdAt')->index('pretrip_createdAt_index');
            $table->foreign('agent_name', 'FK_pretrip_agent_name')
                ->references('agent_name')
                ->on('agents');
            $table->foreign('customer_name', 'FK_pretrip_customer_name')
                ->references('customer_name')
                ->on('customers');
        });
        Schema::create('reserved_vehicles', function (Blueprint $table){
            $table->id('reserved_ID');
            $table->string('vehicle_type');
            $table->string('vehicle_plateNo');
            $table->string('customer_name');
            $table->unsignedBigInteger('pretrip_ID');
            $table->dateTime('reserved_reservationDate');
            $table->foreign('customer_name', 'FK_reserved_customer_name')
                ->references('customer_name')
                ->on('customers');
            $table->foreign('pretrip_ID')
                ->references('pretrip_ID')
                ->on('pretripreceipts');
            $table->foreign('reserved_reservationDate', 'FK_reserved_pretrip_createdAt')
                ->references('pretrip_createdAt')
                ->on('pretripreceipts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pretripReceipts');
        Schema::dropIfExists('Agents');
        Schema::dropIfExists('Customers');
    }
};
