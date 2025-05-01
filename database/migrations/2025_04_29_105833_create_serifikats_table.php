<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('sertifs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('EnrollID');
            $table->foreign('EnrollID')->references('id')->on('enrollments')->onDelete('cascade');
            $table->string('file_path');
            $table->timestamp('created_at')->useCurrent(); // Menggunakan current timestamp untuk created_at
        });

        Schema::table('sertifs', function (Blueprint $table) {
            // Jika kolom id sudah ada tapi tidak auto-increment
            $table->bigIncrements('id')->change();
            
            // Atau alternatif jika perlu drop dulu
            // $table->dropColumn('id');
            // $table->id();
        });
    
    }

    public function down()
    {
        Schema::dropIfExists('sertifs');
    }
};
