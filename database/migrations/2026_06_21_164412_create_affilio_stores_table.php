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
    Schema::create('affilio_stores', function (Blueprint $table) {
        $table->id('store_id');
        $table->uuid('store_uid')->unique();

        $table->unsignedBigInteger('store_user_id');
        $table->unsignedBigInteger('store_package_id')->nullable();

        $table->string('store_username')->unique();
        $table->string('store_name');
        $table->string('store_logo')->nullable();

        $table->string('store_primary_color')->default('#2563eb');
        $table->string('store_secondary_color')->default('#4f46e5');
        $table->string('store_background_color')->default('#020617');
        $table->string('store_text_color')->default('#ffffff');

        $table->text('store_description')->nullable();
        $table->date('store_expired_at')->nullable();
        $table->string('store_status')->default('Menunggu Pembayaran');

        $table->timestamps();

        $table->foreign('store_user_id')
            ->references('user_id')
            ->on('affilio_users')
            ->onDelete('cascade');

        $table->foreign('store_package_id')
            ->references('package_id')
            ->on('affilio_packages')
            ->nullOnDelete();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('affilio_stores');
    }
};