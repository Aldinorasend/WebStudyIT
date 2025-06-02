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
        Schema::create('discussion_replies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('DiscussionID');
            $table->unsignedBigInteger('UserID');
            $table->foreign('DiscussionID')->references('id')->on('modul_discussions')->onDelete('cascade');
            $table->foreign('UserID')->references('id')->on('accounts')->onDelete('cascade');
            $table->string('subtopic');
            $table->text('replies');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discussion_replies');
    }
};
