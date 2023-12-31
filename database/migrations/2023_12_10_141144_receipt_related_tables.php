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
        Schema::create('Leasers', function (Blueprint $table){
            $table->id('leaser_id');
            $table->string('leaser_name')->unique()->index('Leasers_leaser_name');
            $table->integer('leaser_age');
            $table->string('leaser_address');
            $table->string('leaser_contactNo', 11);
        });

        Schema::create('vehicles', function(Blueprint $table){
            $table->string('vehicle_plateNo')->primary();
            $table->string('vehicle_model')->index('Vehicles_vehicle_model_index');
            $table->string('vehicle_type')->index('Vehicles_vehicle_type_index');
            $table->string('vehicle_color')->index('Vehicles_vehicle_color_index');
            $table->string('vehicle_isAvailable')->index('Vehicles_vehicle_isAvailable_index');
            $table->string('vehicle_rentPrice')->index('Vehicles_vehicle_rentPrice_index');
            $table->string('leaser_name');
            $table->foreign('leaser_name', 'FK_vehicles_leaser_name')
                ->references('leaser_name')
                ->on('leasers')->cascadeOnUpdate();
        });

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
                ->on('agents')->cascadeOnUpdate();
            $table->foreign('customer_name', 'FK_pretrip_customer_name')
                ->references('customer_name')
                ->on('customers')->cascadeOnUpdate();
            $table->foreign('vehicle_type', 'FK_pretrip_vehicle_type')
                ->references('vehicle_type')
                ->on('vehicles')->cascadeOnUpdate();
            $table->foreign('vehicle_plateNo', 'FK_pretrip_vehicle_plateNo')
                ->references('vehicle_plateNo')
                ->on('vehicles')->cascadeOnUpdate();
        });

        Schema::create('reserved_vehicles', function (Blueprint $table){
            $table->id('reserved_ID');
            $table->string('vehicle_type');
            $table->string('vehicle_plateNo');
            $table->string('customer_name');
            $table->unsignedBigInteger('pretrip_ID')->unique();
            $table->dateTime('reserved_reservationDate');
            $table->foreign('customer_name', 'FK_reserved_customer_name')
                ->references('customer_name')
                ->on('customers')->cascadeOnUpdate();
            $table->foreign('pretrip_ID', 'FK_reserved_pretrip_ID')
                ->references('pretrip_ID')
                ->on('pretripreceipts')->cascadeOnUpdate();
            $table->foreign('reserved_reservationDate', 'FK_reserved_pretrip_createdAt')
                ->references('pretrip_createdAt')
                ->on('pretripreceipts')->cascadeOnUpdate();
            $table->foreign('vehicle_type', 'FK_reserved_vehicle_type')
                ->references('vehicle_type')
                ->on('vehicles')->cascadeOnUpdate();
            $table->foreign('vehicle_plateNo', 'FK_reserved_vehicle_plateNo')
                ->references('vehicle_plateNo')
                ->on('vehicles')->cascadeOnUpdate();
        });

        Schema::create('released', function (Blueprint $table){
            $table->ulid('released_ID')->primary();
            $table->unsignedBigInteger('pretrip_ID');
            $table->string('vehicle_plateNo');
            $table->string('vehicle_model');
            $table->string('vehicle_type');
            $table->string('customer_name');
            $table->dateTime('pretrip_dateend');
            $table->foreign('pretrip_ID')
                ->references('pretrip_ID')
                ->on('pretripreceipts')->cascadeOnUpdate();
            $table->foreign('customer_name', 'FK_released_customer_name')
                ->references('customer_name')
                ->on('customers')->cascadeOnUpdate();
            $table->foreign('vehicle_plateNo', 'FK_released_vehicle_plateNo')
                ->references('vehicle_plateNo')
                ->on('vehicles')->cascadeOnUpdate();
            $table->foreign('vehicle_model', 'FK_released_vehicle_model')
                ->references('vehicle_model')
                ->on('vehicles')->cascadeOnUpdate();
            $table->foreign('vehicle_type', 'FK_released_vehicle_type')
                ->references('vehicle_type')
                ->on('vehicles')->cascadeOnUpdate();
        });

        Schema::create('extensions', function (Blueprint $table){
            $table->ulid('extension_ID')->primary();
            $table->unsignedBigInteger('pretrip_ID');
            $table->string('vehicle_type');
            $table->string('vehicle_plateNo');
            $table->dateTime('extension_originalEndDateTime');
            $table->dateTime('extension_extendedDateTime');
            $table->double('extension_cost');
            $table->dateTime('extension_createdAt')->index('extension_createdAt_index');
            $table->foreign('pretrip_ID', 'FK_extension_pretrip_ID')
                ->references('pretrip_ID')
                ->on('pretripreceipts')
                ->cascadeOnUpdate();
            $table->foreign('vehicle_type', 'FK_extension_vehicle_type')
                ->references('vehicle_type')
                ->on('vehicles')->cascadeOnUpdate();
            $table->foreign('vehicle_plateNo', 'FK_extension_vehicle_plateNo')
                ->references('vehicle_plateNo')
                ->on('vehicles')->cascadeOnUpdate();
        });

        Schema::create('posttripReceipts', function (Blueprint $table){
            $table->id('posttrip_ID');
            $table->unsignedBigInteger('pretrip_ID')->unique();
            $table->string('agent_name');
            $table->string('customer_name');
            $table->dateTime('posttrip_returnDate');
            $table->integer('posttrip_gasBar');
            $table->longText('posttrip_damageReport');
            $table->double('posttrip_optionalCost');
            $table->double('posttrip_total')
                ->nullable(false)
                ->default(0);
            $table->dateTime('posttrip_createdAt')->index('posttrip_createdAt_index');
            $table->foreign('pretrip_ID', 'FK_posttrip_pretrip_ID')
                ->references('pretrip_ID')
                ->on('pretripreceipts')->cascadeOnUpdate();
            $table->foreign('agent_name', 'FK_posttrip_agent_name')
                ->references('agent_name')
                ->on('agents')->cascadeOnUpdate();
            $table->foreign('customer_name', 'FK_posttrip_customer_name')
                ->references('customer_name')
                ->on('customers')->cascadeOnUpdate();
        });

        Schema::create('receipts', function(Blueprint $table){
            $table->ulid('receipt_ID')->primary();
            $table->unsignedBigInteger('pretrip_ID')->unique();
            $table->unsignedBigInteger('posttrip_ID')->unique();
            $table->integer('pretrip_initialGas');
            $table->integer('pretrip_requestGasLiters');
            $table->integer('pretrip_requestGasPrice');
            $table->boolean('pretrip_requestWash');
            $table->boolean('pretrip_requestHelmet');
            $table->integer('posttrip_gasBar');
            $table->boolean('posttrip_optionalCost');
            $table->string('customer_name');
            $table->string('agent_name');
            $table->string('pretrip_destination');
            $table->string('vehicle_type');
            $table->string('vehicle_plateNo');
            $table->dateTime('pretrip_dateend');
            $table->dateTime('posttrip_returnDate');
            $table->integer('receipt_hourDeficit');
            $table->double('receipt_hourCostDeficit');
            $table->double('receipt_total');
            $table->dateTime('receipt_createdAt');
            $table->foreign('pretrip_ID')
                ->references('pretrip_ID')
                ->on('pretripreceipts')->cascadeOnUpdate();
            $table->foreign('posttrip_ID')
                ->references('posttrip_ID')
                ->on('posttripreceipts')->cascadeOnUpdate();
            $table->foreign('agent_name', 'FK_receipts_agent_name')
                ->references('agent_name')
                ->on('agents')->cascadeOnUpdate();
            $table->foreign('customer_name', 'FK_receipts_customer_name')
                ->references('customer_name')
                ->on('customers')->cascadeOnUpdate();
            $table->foreign('vehicle_type', 'FK_receipts_vehicle_type')
                ->references('vehicle_type')
                ->on('vehicles')->cascadeOnUpdate();
            $table->foreign('vehicle_plateNo', 'FK_receipts_vehicle_plateNo')
                ->references('vehicle_plateNo')
                ->on('vehicles')->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receipts');
        Schema::dropIfExists('posttripReceipts');
        Schema::dropIfExists('extensions');
        Schema::dropIfExists('released');
        Schema::dropIfExists('reserved_vehicles');
        Schema::dropIfExists('pretripReceipts');
        Schema::dropIfExists('released');
        Schema::dropIfExists('vehicles');
        Schema::dropIfExists('Leasers');
        Schema::dropIfExists('Customers');
        Schema::dropIfExists('Agents');
    }
};
