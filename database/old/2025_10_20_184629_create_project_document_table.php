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
          Schema::create('documents', function (Blueprint $table) {
            $table->increments('document_id');
            $table->unsignedInteger('project_id');
            $table->string('document_type', 100);
            $table->string('file_name', 255);
            $table->string('file_path', 255)->nullable();
            $table->date('upload_date')->nullable();
            $table->date('expiring_date')->nullable();
            $table->string('status', 50)->default('Active');
            $table->foreign('project_id')->references('pro_id')->on('projects')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_document');
    }
};
