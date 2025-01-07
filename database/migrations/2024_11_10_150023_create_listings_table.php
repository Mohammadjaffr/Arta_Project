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
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->foreignId('region_id')->constrained('regions')->onDelete('cascade');
            $table->enum('status', ['جديد', 'شبه جديد', 'مستعمل']);
            $table->string('primary_image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listings');
    }
};
