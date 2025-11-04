<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('loan_repayments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('loan_id')->constrained()->onDelete('cascade');
            $table->integer('installment_number')->default(1);
            $table->date('due_date');
            $table->decimal('principal_amount', 14, 2);
            $table->decimal('interest_amount', 14, 2);
            $table->decimal('penalty_amount', 14, 2)->default(0.00);
            $table->decimal('total_amount', 14, 2);
            $table->date('paid_date')->nullable();
            $table->decimal('paid_amount', 14, 2)->default(0.00);
            $table->enum('status', ['pending', 'paid', 'overdue', 'partial', 'waived'])->default('pending');
            $table->enum('payment_method', ['cash', 'bank_transfer', 'cheque', 'online'])->nullable();
            $table->string('reference_number')->nullable();
            $table->text('notes')->nullable();
            $table->foreignId('received_by')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('created_by')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('updated_by')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamps();

            $table->index(['loan_id', 'due_date']);
            $table->index(['status', 'due_date']);
            $table->index(['loan_id', 'installment_number']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('loan_repayments');
    }
};