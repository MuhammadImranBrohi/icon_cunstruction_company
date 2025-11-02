<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. FIRST create user_roles table
        Schema::create('user_roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // admin, manager, supervisor, client, employee
            $table->string('display_name');
            $table->text('description')->nullable();
            $table->boolean('is_system')->default(false);
            $table->timestamps();
        });

        // 2. THEN create users table
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');

            // Personal Information
            $table->string('phone', 20)->nullable();
            $table->text('address')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();

            // Authentication
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();

            // Two-Factor Authentication (Jetstream)
            $table->text('two_factor_secret')->nullable();
            $table->text('two_factor_recovery_codes')->nullable();
            $table->timestamp('two_factor_confirmed_at')->nullable();

            // Team Features (Jetstream)
            $table->foreignId('current_team_id')->nullable()->constrained('teams')->nullOnDelete();
            $table->string('profile_photo_path', 2048)->nullable();

            // Custom Fields
            $table->boolean('is_active')->default(true);
            $table->timestamp('last_login_at')->nullable();

            // Role Relationship
            $table->foreignId('role_id')->constrained('user_roles')->onDelete('cascade');

            // Audit Fields
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->foreignId('updated_by')->nullable()->constrained('users');

            $table->timestamps();
        });

        // 3. Other Laravel default tables
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('users');
        Schema::dropIfExists('user_roles');
    }
};
