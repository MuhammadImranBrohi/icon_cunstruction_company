<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('material_purchases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('material_id')->constrained();
            $table->foreignId('project_id')->constrained();
            $table->string('purchase_order_number')->unique()->nullable();
            $table->decimal('quantity', 10, 2);
            $table->decimal('unit_price', 12, 2);
            $table->decimal('total_cost', 14, 2);
            $table->date('purchase_date');
            $table->date('delivery_date')->nullable();
            $table->enum('payment_method', ['cash', 'bank_loan', 'personal_loan', 'credit', 'online']);
            $table->foreignId('loan_id')->nullable()->constrained();
            $table->foreignId('supplier_id')->constrained();
            $table->foreignId('purchased_by')->constrained('employees');
            $table->enum('status', ['ordered', 'delivered', 'cancelled'])->default('ordered');
            $table->text('notes')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->foreignId('updated_by')->nullable()->constrained('users');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('material_purchases');
    }
};