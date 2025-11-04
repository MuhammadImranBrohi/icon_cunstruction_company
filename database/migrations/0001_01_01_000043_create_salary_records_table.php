<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('salary_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained();

            // NEW COLUMNS FOR MULTI-PERIOD SUPPORT
            $table->enum('record_type', ['daily', 'weekly', 'monthly'])->default('monthly');
            $table->date('period_start_date')->nullable();
            $table->date('period_end_date')->nullable();
            $table->integer('year')->nullable();
            $table->string('payment_period')->nullable();
            $table->boolean('is_advance')->default(false);
            $table->decimal('advance_amount', 12, 2)->default(0.00);
            $table->decimal('remaining_advance', 12, 2)->default(0.00);

            // EXISTING COLUMNS (UPDATED)
            $table->integer('month');
            $table->integer('total_days');
            $table->integer('present_days');
            $table->decimal('basic_salary', 12, 2);
            $table->decimal('allowances', 12, 2)->default(0.00);
            $table->decimal('deductions', 12, 2)->default(0.00);
            $table->decimal('overtime_amount', 12, 2)->default(0.00);
            $table->decimal('gross_amount', 12, 2);
            $table->decimal('net_amount', 12, 2);
            $table->enum('status', ['draft', 'processed', 'paid', 'cancelled'])->default('draft');
            $table->date('paid_date')->nullable();
            $table->enum('payment_method', ['cash', 'bank_transfer', 'cheque'])->default('bank_transfer');
            $table->text('notes')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->foreignId('updated_by')->nullable()->constrained('users');
            $table->timestamps();

            // Indexes for better performance
            $table->index(['employee_id', 'record_type']);
            $table->index(['period_start_date', 'period_end_date']);
            $table->index(['record_type', 'status']);
            $table->index(['month', 'year']);
            $table->index(['is_advance', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('salary_records');
    }
};
