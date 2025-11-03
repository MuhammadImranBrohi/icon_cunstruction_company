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
        Schema::create('equipment', function (Blueprint $table) {
            $table->increments('equip_id');
            $table->string('equip_name', 255);
            $table->string('equip_type', 100)->nullable();
            $table->text('equip_description')->nullable();
            $table->date('equip_purchase_date')->nullable();
            $table->decimal('equip_purchase_price', 12, 2)->default(0);
            $table->string('equip_maintenance_schedule', 150)->nullable();
            $table->string('equip_status', 50)->default('Available');
            $table->string('equip_current_location', 150)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipment');
    }
};