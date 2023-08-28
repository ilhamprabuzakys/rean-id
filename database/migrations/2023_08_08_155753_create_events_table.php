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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->integer('views')->default(0); // Tambahkan kolom views
            $table->integer('like')->default(0);
            $table->string('title');
            $table->string('slug', 255);
            $table->text('description');
            $table->text('location');
            $table->text('latitude');
            $table->text('longitude');
            $table->string('province');
            $table->string('city');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            // Masuknya ke relasi USER
            $table->string('contact_email');
            $table->string('organizer');
            $table->boolean('status')->default(TRUE);
            $table->foreignId('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
