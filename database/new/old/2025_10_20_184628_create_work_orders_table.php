<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('work_orders', function (Blueprint $table) {
            $table->increments('work_order_id');
            $table->unsignedInteger('project_id');
            $table->text('description')->nullable();
            $table->string('status', 100)->default('Pending');
            $table->unsignedInteger('assigned_to')->nullable();
            $table->date('start_date')->nullable();
            $table->date('due_date')->nullable();
            $table->date('completion_date')->nullable();
            $table->string('priority', 50)->nullable();
            $table->foreign('project_id')->references('pro_id')->on('projects')->onDelete('cascade');
            $table->foreign('assigned_to')->references('emp_id')->on('employees')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        schema::disableForeignKeyConstraints();
        Schema::dropIfExists('work_orders');
        Schema::enableForeignKeyConstraints();
    }
};