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
        Schema::create('materials', function (Blueprint $table) {
            $table->increments('material_id');
            $table->string('name', 150);
            $table->text('description')->nullable();
            $table->string('unit', 50)->nullable();
            $table->decimal('unit_price', 12, 2)->default(0);
            $table->integer('min_stock')->default(0);
            $table->integer('current_stock')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('material_stock');
    }
};