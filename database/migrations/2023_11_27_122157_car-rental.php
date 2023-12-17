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
            $table->foreign('agent_name')
                ->references('agent_name')
                ->on('Agents')->cascadeOnUpdate();
        });

        /*
        STAMP EMERGENCY CONTACTS HERE
        */
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Users');
    }
};
