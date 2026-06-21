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
    Schema::create('affilio_users', function (Blueprint $table) {
        $table->id('user_id');
        $table->uuid('user_uid')->unique();
        $table->string('user_name');
        $table->string('user_email')->unique();
        $table->string('user_password');
        $table->string('user_whatsapp')->nullable();
        $table->string('user_status')->default('Menunggu Pembayaran');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('affilio_users');
    }
};