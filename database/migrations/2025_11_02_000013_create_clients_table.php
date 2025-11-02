<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->nullable()->constrained()->onDelete('set null');
            $table->string('company_name');
            $table->string('contact_person')->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('email')->nullable();
            $table->text('address')->nullable();
            $table->string('city', 100)->nullable();
            $table->string('state', 100)->nullable();
            $table->string('country', 100)->default('Pakistan');
            $table->string('tax_number', 100)->nullable();
            $table->string('registration_number', 100)->nullable();
            $table->enum('client_type', ['individual', 'company', 'government'])->default('individual');
            $table->enum('status', ['active', 'inactive', 'suspended'])->default('active');
            $table->decimal('credit_limit', 14, 2)->default(0);
            $table->enum('payment_terms', ['net_15', 'net_30', 'net_45', 'net_60'])->default('net_30');
            $table->text('notes')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->foreignId('updated_by')->nullable()->constrained('users');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};