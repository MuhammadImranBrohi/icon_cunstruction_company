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
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('emp_id');
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->string('emp_cnic', 100)->unique();
            $table->string('emp_phone', 50)->nullable();
            $table->string('emp_email', 255)->nullable();
            $table->date('hire_date')->nullable();
            $table->decimal('salary', 12, 2)->default(0);
            $table->string('emp_specialization', 150)->nullable();
            $table->unsignedInteger('dept_id');
            $table->unsignedInteger('dest_id');
            $table->foreign('dept_id')->references('dept_id')->on('departments')->onDelete('cascade');
            $table->foreign('dest_id')->references('dest_id')->on('designations')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('employees');
        Schema::enableForeignKeyConstraints();
    }
};