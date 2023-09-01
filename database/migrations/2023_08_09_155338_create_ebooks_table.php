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
        Schema::create('ebooks', function (Blueprint $table) {
            $table->id();
            $table->integer('like')->default(0);
            $table->integer('views')->default(0); // Tambahkan kolom views
            $table->string('title');
            $table->string('description');
            $table->string('author');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->text('body');
            $table->string('published_at', 5);
            $table->foreignId('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ebooks');
    }
};
