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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('conversation_id');
            $table->unsignedBigInteger('sender_id');
            $table->unsignedBigInteger('receiver_id');
            $table->foreign('sender_id')->references('id')->on('users');
            $table->foreign('receiver_id')->references('id')->on('users');
            $table->boolean('read')->default(0)->nullable();
            $table->text('body')->nullable();
            // $table->unsignedBigInteger('conversation_id');
            // $table->unsignedBigInteger('sender_id');
            // $table->unsignedBigInteger('receiver_id');
            // $table->foreign('sender_id')
            //     ->references('id')->on('users')
            //     ->onDelete('cascade');
            // $table->foreign('receiver_id')
            //     ->references('id')->on('users')
            //     ->onDelete('cascade');
            // $table->boolean('read')->default(0);
            // $table->text('body');
            $table->string('type')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
