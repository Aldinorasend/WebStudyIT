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
        Schema::table('accounts', function(Blueprint $table){
            $table->string('reset_token')->nullable();
            $table->timestamp('reset_token_expiry')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('accounts', function(Blueprint $table){
            $table->dropColumn(['reset_token', 'reset_token_expiry']);
        });
    }
};
