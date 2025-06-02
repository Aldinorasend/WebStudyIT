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
        Schema::table('accounts', function (Blueprint $table) {

            //
            Schema::disableForeignKeyConstraints();
            $table->string('otp', 9)->nullable();
            $table->datetime('otp_expiry')->nullable();
            $table->string('twofa_secret')->nullable();
            $table->tinyInteger('is_verified')->nullable();
            Schema::enableForeignKeyConstraints();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('accounts', function (Blueprint $table) {
            //
        });
    }
};
