<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->constrained()->onDelete('cascade');
            $table->string('employee_code')->unique();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('father_name')->nullable();
            $table->string('cnic', 15)->unique()->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('personal_email')->nullable();
            $table->string('emergency_contact', 20)->nullable();
            $table->string('emergency_contact_name')->nullable();
            $table->date('hire_date');
            $table->date('termination_date')->nullable();
            $table->decimal('salary', 12, 2)->default(0);
            $table->foreignId('department_id')->constrained();
            $table->foreignId('designation_id')->constrained();
            $table->foreignId('reporting_to')->nullable()->constrained('employees');
            $table->enum('employment_type', ['permanent', 'contract', 'probation'])->default('permanent');
            $table->string('bank_account_number', 50)->nullable();
            $table->string('bank_name')->nullable();
            $table->boolean('is_active')->default(true);
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->foreignId('updated_by')->nullable()->constrained('users');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};