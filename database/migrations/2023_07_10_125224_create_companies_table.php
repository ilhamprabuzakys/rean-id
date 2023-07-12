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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("address");
            $table->string("short_address");
            $table->string("email");
            $table->string("phone");
            $table->string("formattedPhone");
            $table->string("province");
            $table->text("about");
            $table->string("description");
            // Social Media
            $table->foreignId('social_media_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
