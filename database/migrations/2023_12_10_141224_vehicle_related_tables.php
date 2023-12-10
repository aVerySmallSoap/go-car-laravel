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

        Schema::create('Cars', function (Blueprint $table){
            $table->string('car_plateNo')->primary();
            $table->string('car_name')->index('Cars_car_name_index');
            $table->string('car_type')->index('Cars_car_type_index');
            $table->string('car_color')->index('Cars_car_color_index');
            $table->boolean('car_isAvailable')->index('Cars_car_isAvailable_index');
            $table->double('car_rentPrice')->index('Cars_car_rentPrice_index');
            $table->string('leaser_name');
            $table->foreign('leaser_name')->references('leaser_name')->on('Leasers');
        });

        Schema::create('Motorcycles', function (Blueprint $table){
            $table->string('motor_plateNo')->primary();
            $table->string('motor_name')->index('Motorcycles_motor_name_index');
            $table->string('motor_type')->index('Motorcycles_motor_type_index');
            $table->string('motor_color')->index('Motorcycles_motor_color_index');
            $table->boolean('motor_isAvailable')->index('Motorcycles_motor_isAvailable_index');
            $table->double('motor_rentPrice')->index('Motorcycles_motor_rentPrice_index');
            $table->string('leaser_name');
            $table->foreign('leaser_name')->references('leaser_name')->on('Leasers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Cars');
        Schema::dropIfExists('Motorcycles');
        Schema::dropIfExists('Leasers');
    }
};
