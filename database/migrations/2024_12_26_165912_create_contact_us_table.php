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
        Schema::create('contact_us', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Users_id'); // Kolom foreign key
            $table->foreign('Users_id')->references('id')->on('accounts')->onDelete('cascade');
            $table->string('First_name');
            $table->string('Last_name');
            $table->string('Email');
            $table->string('Phone_number');
            $table->string('Message');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_us');
    }
};
