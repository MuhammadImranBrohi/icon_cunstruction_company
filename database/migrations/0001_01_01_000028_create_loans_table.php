<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('loan_type_id')->constrained();
            $table->string('lender_name');
            $table->string('lender_contact')->nullable();
            $table->text('lender_address')->nullable();
            $table->foreignId('project_id')->constrained();
            $table->decimal('principal_amount', 14, 2);
            $table->decimal('interest_rate', 5, 2)->default(0);
            $table->decimal('total_payable', 14, 2)->nullable();
            $table->date('issue_date');
            $table->date('due_date')->nullable();
            $table->boolean('is_interest_free')->default(false);
            $table->enum('status', ['active', 'paid', 'overdue'])->default('active');
            $table->decimal('remaining_balance', 14, 2);
            $table->text('description')->nullable();
            $table->string('loan_document_path')->nullable();

            // Repayment System Columns (without 'after' clause)
            $table->integer('total_installments')->default(1);
            $table->integer('paid_installments')->default(0);
            $table->date('next_installment_date')->nullable();
            $table->decimal('penalty_rate', 5, 2)->default(0.00);
            $table->enum('repayment_frequency', ['monthly', 'quarterly', 'yearly', 'custom'])->default('monthly');
            $table->decimal('monthly_installment', 14, 2)->nullable();

            // Integrated Repayment Details
            $table->json('repayment_schedule')->nullable();
            $table->decimal('total_paid_amount', 14, 2)->default(0.00);
            $table->decimal('total_penalty_amount', 14, 2)->default(0.00);
            $table->date('last_payment_date')->nullable();
            $table->enum('last_payment_method', ['cash', 'bank_transfer', 'cheque', 'online'])->nullable();
            $table->string('last_reference_number')->nullable();
            $table->text('repayment_notes')->nullable();
            $table->foreignId('last_received_by')->nullable()->constrained('users');

            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->foreignId('updated_by')->nullable()->constrained('users');
            $table->timestamps();

            // Indexes for better performance
            $table->index(['status', 'next_installment_date']);
            $table->index(['lender_name', 'status']);
            $table->index(['project_id', 'status']);
            $table->index(['due_date', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};