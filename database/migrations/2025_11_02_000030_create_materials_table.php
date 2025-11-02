<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->unique()->nullable();
            $table->text('description')->nullable();
            $table->foreignId('material_category_id')->constrained();
            $table->foreignId('unit_of_measure_id')->constrained();
            $table->decimal('unit_price', 12, 2)->default(0);
            $table->foreignId('supplier_id')->constrained();
            $table->decimal('current_stock', 10, 2)->default(0);
            $table->decimal('min_stock_level', 10, 2)->default(0);
            $table->decimal('max_stock_level', 10, 2)->default(0);
            $table->decimal('reorder_level', 10, 2)->default(0);
            $table->boolean('is_active')->default(true);
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->foreignId('updated_by')->nullable()->constrained('users');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('materials');
    }
};