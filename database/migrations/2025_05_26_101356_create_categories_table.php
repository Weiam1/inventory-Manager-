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
                // Create categories table

        Schema::create('categories', function (Blueprint $table) {
            $table->id();
             $table->string('name');
            $table->timestamps();
        });
        // Add category_id to products table

           Schema::table('products', function (Blueprint $table) {
            $table->foreignId('category_id')->nullable()->constrained()->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
                // Remove category_id from products table
          Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
        });
                // Drop categories table

        Schema::dropIfExists('categories');
    }
};
