<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('client_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained();
            $table->foreignId('client_id')->constrained();
            $table->enum('payment_type', ['advance', 'installment', 'final', 'retention']);
            $table->decimal('amount', 14, 2);
            $table->date('payment_date');
            $table->enum('payment_method', ['cash', 'cheque', 'bank_transfer', 'online']);
            $table->string('reference_number')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('account_number')->nullable();
            $table->foreignId('received_by')->constrained('employees');
            $table->text('description')->nullable();
            $table->enum('status', ['pending', 'confirmed', 'cancelled'])->default('confirmed');
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->foreignId('updated_by')->nullable()->constrained('users');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('client_payments');
    }
};