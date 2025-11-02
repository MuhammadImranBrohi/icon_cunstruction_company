<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained();
            $table->foreignId('expense_category_id')->constrained();
            $table->string('title');
            $table->text('description');
            $table->decimal('amount', 12, 2);
            $table->date('expense_date');
            $table->foreignId('spent_by')->constrained('employees');
            $table->foreignId('approved_by')->nullable()->constrained('users');
            $table->enum('payment_method', ['cash', 'bank_transfer', 'cheque', 'online']);
            $table->string('receipt_number')->nullable();
            $table->string('receipt_image_path')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->text('rejection_reason')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->foreignId('updated_by')->nullable()->constrained('users');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};