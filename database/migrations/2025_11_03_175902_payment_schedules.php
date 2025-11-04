<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payment_schedules', function (Blueprint $table) {
            $table->id();
            $table->enum('schedule_type', ['daily', 'weekly', 'monthly', 'quarterly', 'custom']);
            $table->string('title');
            $table->text('description')->nullable();
            $table->decimal('amount', 14, 2);
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->integer('frequency')->default(1);
            $table->enum('day_of_week', [
                'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'
            ])->nullable();
            $table->integer('day_of_month')->nullable();

            $table->enum('recipient_type', [
                'employee', 'supervisor', 'vendor', 'client', 'contractor', 'other'
            ]);
            $table->unsignedBigInteger('recipient_id')->nullable();
            $table->string('recipient_name')->nullable();

            $table->foreignId('project_id')->nullable()->constrained()->onDelete('cascade');
            $table->enum('payment_method', ['cash', 'bank_transfer', 'cheque', 'online']);
            $table->enum('status', ['active', 'completed', 'cancelled', 'paused'])->default('active');

            $table->date('last_payment_date')->nullable();
            $table->date('next_payment_date')->nullable();
            $table->integer('total_occurrences')->nullable();
            $table->integer('completed_occurrences')->default(0);

            $table->foreignId('created_by')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('updated_by')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamps();

            $table->index(['schedule_type', 'status']);
            $table->index(['recipient_type', 'recipient_id']);
            $table->index('next_payment_date');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payment_schedules');
    }
};
