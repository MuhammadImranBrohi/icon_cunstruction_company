<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('project_code')->unique();
            $table->string('title');
            $table->text('description')->nullable();
            $table->text('location')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->decimal('estimated_budget', 14, 2)->default(0);
            $table->decimal('actual_cost', 14, 2)->default(0);
            $table->foreignId('project_category_id')->constrained();
            $table->foreignId('project_status_id')->constrained();
            $table->foreignId('client_id')->constrained();
            $table->foreignId('manager_id')->constrained('employees');
            $table->decimal('contract_amount', 14, 2)->default(0);
            $table->decimal('advance_payment', 14, 2)->default(0);
            $table->decimal('retention_percentage', 5, 2)->default(0);
            $table->decimal('completion_percentage', 5, 2)->default(0);
            $table->text('notes')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->foreignId('updated_by')->nullable()->constrained('users');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};