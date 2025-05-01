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
        //
        Schema::create('subscribers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('UserID');
            $table->foreign('UserID')->references('id')->on('accounts')->onDelete('cascade');
            $table->enum('Payment_method', ['Dana', 'Gopay', 'ShoppePay']);
            $table->string('Phone_number');
            $table->integer('Amount')->nullable();
            $table->enum('Category', ['Basic', 'Standard', 'Premium'])->default('Basic');
            $table->enum('Status', ['Pending', 'Completed'])->default('Pending');
            $table->timestamp('Payment_date')->useCurrent(); // Menggunakan current timestamp untuk created_at
            $table->timestamp('End_date')->nullable(); // Menggunakan current timestamp untuk updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('subscribers');
    }
};
