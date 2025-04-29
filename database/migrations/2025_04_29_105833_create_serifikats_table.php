<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('sertifs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('file_path');
            $table->string('recipient_name');
            $table->timestamps();
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
        Schema::dropIfExists('sertifikats');
    }
};
