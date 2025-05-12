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
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('UserID');
            $table->unsignedBigInteger('CourseID');
            $table->unsignedBigInteger('Progress')->default(0);
            $table->foreign('UserID')->references('id')->on('accounts')->onDelete('cascade');
            $table->foreign('CourseID')->references('id')->on('courses')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ModulID');
            $table->unsignedBigInteger('EnrollID');
            $table->foreign('ModulID')->references('id')->on('moduls')->onDelete('cascade');
            $table->foreign('EnrollID')->references('id')->on('enrollments')->onDelete('cascade');
            $table->string('FileTask');
            $table->enum('Status', ['Pending', 'Completed', 'Submitted', 'Rejected'])->default('Pending');
            $table->text('Comment')->nullable();
            $table->timestamp('SubmittedAt')->useCurrent();
        });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollments');
        Schema::dropIfExists('tasks');
    }
};
