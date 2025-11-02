<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('material_usage', function (Blueprint $table) {
            $table->id();
            $table->foreignId('material_id')->constrained();
            $table->foreignId('project_id')->constrained();
            $table->foreignId('task_id')->nullable()->constrained();
            $table->decimal('quantity', 10, 2);
            $table->decimal('unit_price', 12, 2);
            $table->decimal('total_cost', 14, 2);
            $table->date('usage_date');
            $table->foreignId('used_by')->constrained('employees');
            $table->text('notes')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->foreignId('updated_by')->nullable()->constrained('users');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('material_usage');
    }
};