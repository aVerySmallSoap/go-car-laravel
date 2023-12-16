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
                ->on('agents')
                ->cascadeOnUpdate();
            $table->foreign('customer_name', 'FK_pretrip_customer_name')
                ->references('customer_name')
                ->on('customers')
                ->cascadeOnUpdate();
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
                ->on('customers')
                ->cascadeOnUpdate();
            $table->foreign('pretrip_ID', 'FK_reserved_pretrip_ID')
                ->references('pretrip_ID')
                ->on('pretripreceipts')
                ->cascadeOnUpdate();
            $table->foreign('reserved_reservationDate', 'FK_reserved_pretrip_createdAt')
                ->references('pretrip_createdAt')
                ->on('pretripreceipts')
                ->cascadeOnUpdate();
        });

        Schema::create('released', function (Blueprint $table){
            $table->ulid('released_ID')->primary();
            $table->unsignedBigInteger('pretrip_ID');
            $table->string('vehicle_plateNo');
            $table->string('vehicle_model');
            $table->string('vehicle_type');
            $table->string('customer_name');
            $table->dateTime('pretrip_dateend');
            $table->foreign('customer_name', 'FK_released_customer_name')
                ->references('customer_name')
                ->on('customers')
                ->cascadeOnUpdate();
        });

        Schema::create('extensions', function (Blueprint $table){
            $table->ulid('extension_ID')->primary();
            $table->ulid('released_ID');
            $table->unsignedBigInteger('pretrip_ID');
            $table->string('vehicle_type');
            $table->string('vehicle_plateNo');
            $table->dateTime('extension_originalEndDateTime');
            $table->dateTime('extension_extendedDateTime');
            $table->double('extension_cost');
            $table->foreign('pretrip_ID', 'FK_extension_pretrip_ID')
                ->references('pretrip_ID')
                ->on('pretripreceipts')
                ->cascadeOnUpdate();
            $table->foreign('released_ID', 'FK_extension_released_ID')
                ->references('released_ID')
                ->on('released');
        });

        Schema::create('posttripReceipts', function (Blueprint $table){
            $table->id('posttrip_ID');
            $table->unsignedBigInteger('pretrip_ID');
            $table->string('agent_name');
            $table->string('customer_name');
            $table->dateTime('posttrip_returnDate');
            $table->integer('posttrip_gasBar');
            $table->longText('posttrip_damageReport');
            $table->float('posttrip_optionalCost');
            $table->double('posttrip_total')
                ->nullable(false)
                ->default(0);
            $table->foreign('pretrip_ID', 'FK_posttrip_pretrip_ID')
                ->references('pretrip_ID')
                ->on('pretripreceipts')
                ->cascadeOnUpdate();
            $table->foreign('agent_name', 'FK_posttrip_agent_name')
                ->references('agent_name')
                ->on('agents')
                ->cascadeOnUpdate();
            $table->foreign('customer_name', 'FK_posttrip_customer_name')
                ->references('customer_name')
                ->on('customers')
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posttripReceipts');
        Schema::dropIfExists('extensions');
        Schema::dropIfExists('released');
        Schema::dropIfExists('reserved_vehicles');
        Schema::dropIfExists('pretripReceipts');
        Schema::dropIfExists('released');
        Schema::dropIfExists('Customers');
        Schema::dropIfExists('Agents');
    }
};
