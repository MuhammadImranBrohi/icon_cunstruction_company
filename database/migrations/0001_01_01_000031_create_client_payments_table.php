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

            // NEW COLUMNS FOR PAYMENT FREQUENCY (without 'after')
            $table->enum('payment_frequency', ['one_time', 'daily', 'weekly', 'monthly', 'quarterly'])->default('one_time');
            $table->boolean('is_recurring')->default(false);
            $table->date('next_payment_date')->nullable();
            $table->date('period_start_date')->nullable();
            $table->date('period_end_date')->nullable();
            $table->string('schedule_id')->nullable();
            $table->decimal('pending_balance', 14, 2)->default(0.00);

            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->foreignId('updated_by')->nullable()->constrained('users');
            $table->timestamps();

            // Indexes for better performance
            $table->index(['payment_date', 'status']);
            $table->index(['client_id', 'payment_type']);
            $table->index(['payment_frequency', 'next_payment_date']);
            $table->index(['is_recurring', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('client_payments');
    }
};
