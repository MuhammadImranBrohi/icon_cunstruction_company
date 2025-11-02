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
        Schema::create('material_detail', function (Blueprint $table) {
            $table->increments('material_detail_id');
            $table->unsignedInteger('material_id');
            $table->unsignedInteger('sup_id');
            $table->unsignedInteger('pro_id');
            $table->unsignedInteger('material_type_id');
            $table->integer('quantity')->default(0);
            $table->decimal('unit_price', 12, 2)->default(0);

            $table->foreign('material_id')->references('material_id')->on('materials');
            $table->foreign('sup_id')->references('sup_id')->on('suppliers');
            $table->foreign('pro_id')->references('pro_id')->on('projects');
            $table->foreign('material_type_id')->references('material_type_id')->on('material_nature');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('material_detail');
    }
};
