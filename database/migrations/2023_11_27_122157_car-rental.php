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
        Schema::create('Users', function (Blueprint $table){
            $table->id('user_id');
            $table->string('user_username')->unique();
            $table->longText('user_password');
            $table->string('user_role');
            $table->timestamp('user_createdAt');
        });

        Schema::create('Agents', function (Blueprint $table){
            $table->id('agent_id');
            $table->string('agent_name')->unique()->index('Agents_agent_name_index');
            $table->integer('agent_age');
            $table->string('agent_address');
        });

        Schema::create('Customers', function (Blueprint $table){
            $table->id('customer_id');
            $table->string('agent_name');
            $table->string('customer_name')->unique()->index('Customers_customer_name_index');
            $table->integer('customer_age')->index('Customers_customer_age_index');
            $table->string('customer_civilStatus');
            $table->string('customer_contactNo', 11);
            $table->longText('customer_facebookURL');
            $table->foreign('agent_name')->references('agent_name')->on('Agents');
        });

        /*
        STAMP EMERGENCY CONTACTS HERE
        */

        Schema::create('Leasers', function (Blueprint $table){
            $table->id('leaser_id');
            $table->string('leaser_name')->unique()->index('Leasers_leaser_name');
            $table->integer('leaser_age');
            $table->string('leaser_address');
            $table->string('leaser_contactNo', 11);
        });

        Schema::create('Cars', function (Blueprint $table){
            $table->string('car_plateNo')->primary();
            $table->string('car_name')->index('Cars_car_name_index');
            $table->string('car_type')->index('Cars_car_type_index');
            $table->string('car_color')->index('Cars_car_color_index');
            $table->boolean('car_isAvailable')->index('Cars_car_isAvailable_index');
            $table->string('leaser_name');
            $table->foreign('leaser_name')->references('leaser_name')->on('Leasers');
        });

        Schema::create('Motorcycles', function (Blueprint $table){
            $table->string('motor_plateNo')->primary();
            $table->string('motor_name')->index('Motorcycles_motor_name_index');
            $table->string('motor_type')->index('Motorcycles_motor_type_index');
            $table->string('motor_color')->index('Motorcycles_motor_color_index');
            $table->boolean('motor_isAvailable')->index('Motorcycles_motor_isAvailable_index');
            $table->string('leaser_name');
            $table->foreign('leaser_name')->references('leaser_name')->on('Leasers');
        });

        Schema::create('Vehicles', function (Blueprint $table){
            $table->string('vehicle_plateNo')->primary();
            $table->string('vehicle_name');
            $table->string('vehicle_color');
            $table->string('vehicle_type');
            $table->foreign('vehicle_plateNo', 'FK_Vehicles_vehicle_plateNo_cars')
                ->references('car_plateNo')->on('Cars');
            $table->foreign('vehicle_plateNo', 'FK_Vehicles_vehicle_plateNo_motorcycles')
                ->references('motor_plateNo')->on('Motorcycles');
            $table->foreign('vehicle_name', 'FK_Vehicles_vehicle_name_cars')
                ->references('car_name')->on('Cars');
            $table->foreign('vehicle_name', 'FK_Vehicles_vehicle_name_motorcycles')
                ->references('motor_name')->on('Motorcycles');
            $table->foreign('vehicle_color', 'FK_Vehicles_vehicle_color_cars')
                ->references('car_color')->on('Cars');
            $table->foreign('vehicle_color', 'FK_Vehicles_vehicle_color_motorcycles')
                ->references('motor_color')->on('Motorcycles');
            $table->foreign('vehicle_type', 'FK_Vehicles_vehicle_type_cars')
                ->references('car_type')->on('Cars');
            $table->foreign('vehicle_type', 'FK_Vehicles_vehicle_type_motorcycles')
                ->references('motor_type')->on('Motorcycles');
        });

        Schema::create('pretripReceipts', function (Blueprint $table) {
            $table->id('pretrip_ID');
            $table->string('agent_name');
            $table->string('customer_name');
            $table->string('vehicle_name');
            $table->string('pretrip_typeOfID');
            $table->dateTime('pretrip_datestart')->index('pretrip_datestart_index');
            $table->dateTime('pretrip_dateend')->index('pretrip_dateend_index');
            $table->string('pretrip_destination');
            $table->integer('pretrip_initialGas');
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
            $table->foreign('vehicle_name', 'FK_pretrip_vehicle_name_cars')
                ->references('car_name')->on('Cars');
            $table->foreign('vehicle_name', 'FK_pretrip_vehicle_name_motorcycles')
                ->references('motor_name')->on('Motorcycles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Users');
        Schema::dropIfExists('Agents');
        Schema::dropIfExists('Customers');
        Schema::dropIfExists('Leasers');
        Schema::dropIfExists('Cars');
        Schema::dropIfExists('Motorcycles');
        Schema::dropIfExists('Vehicles');
        Schema::dropIfExists('pretripReceipts');
    }
};
