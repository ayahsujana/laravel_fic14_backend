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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')
            ->constrained('categories')
            ->onDelete('cascade');
            $table->string('name');
            $table->text('description')->nullable();
            $table->double('hpp')->default(0);
            $table->integer('price')->default(0);
            $table->integer('stock')->default(0);
            $table->integer('barcode')->default(0);
            $table->string('image')->nullable();
            $table->boolean('is_best_seller')->default(false);
            $table->boolean('is_available')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
