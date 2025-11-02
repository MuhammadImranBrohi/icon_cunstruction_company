<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone', 20)->nullable()->after('email');
            $table->text('address')->nullable()->after('phone');
            $table->date('date_of_birth')->nullable()->after('address');
            $table->enum('gender', ['male', 'female', 'other'])->nullable()->after('date_of_birth');
            $table->string('profile_picture', 255)->nullable()->after('gender');
            $table->boolean('is_active')->default(true)->after('profile_picture');
            $table->timestamp('last_login_at')->nullable()->after('is_active');
            $table->foreignId('created_by')->nullable()->after('last_login_at')->constrained('users');
            $table->foreignId('updated_by')->nullable()->after('created_by')->constrained('users');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'phone', 'address', 'date_of_birth', 'gender',
                'profile_picture', 'is_active', 'last_login_at',
                'created_by', 'updated_by'
            ]);
        });
    }
};
