<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('role_has_permissions', function (Blueprint $table) {
    $table->foreignId('permission_id')->constrained('permissions')->onDelete('cascade'); // permissions table exist hona chahiye
    $table->foreignId('role_id')->constrained('user_roles')->onDelete('cascade'); // roles -> user_roles
    $table->primary(['permission_id', 'role_id']);
});

    }

    public function down(): void
    {
        Schema::dropIfExists('role_has_permissions');
    }
};
