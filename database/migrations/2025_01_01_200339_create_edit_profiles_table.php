<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEditProfilesTable extends Migration
{
    public function up()
    {
        Schema::create('edit_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('profile_picture')->nullable(); // Allow null for optional profile pictures
            $table->text('bio')->nullable(); // Allow null for optional bio
            $table->timestamps(); // Add created_at and updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('edit_profiles');
    }
}
