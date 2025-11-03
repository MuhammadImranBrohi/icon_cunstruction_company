<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('funding_sources', function (Blueprint $table) {
            $table->id();
            $table->foreignId('funding_source_type_id')->constrained();
            $table->string('source_name')->nullable();
            $table->foreignId('project_id')->constrained();
            $table->decimal('amount', 14, 2);
            $table->date('received_date');
            $table->decimal('interest_rate', 5, 2)->default(0);
            $table->date('due_date')->nullable();
            $table->boolean('is_interest_applied')->default(false);
            $table->enum('status', ['received', 'pending', 'partial'])->default('received');
            $table->text('description')->nullable();
            $table->string('reference_number')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->foreignId('updated_by')->nullable()->constrained('users');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('funding_sources');
    }
};