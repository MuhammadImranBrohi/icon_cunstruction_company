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
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->foreignId('updated_by')->nullable()->constrained('users');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};