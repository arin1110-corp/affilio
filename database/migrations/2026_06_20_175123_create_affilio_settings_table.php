<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('affilio_settings', function (Blueprint $table) {
            $table->id('setting_id');
            $table->string('site_name')->default('Affilio');
            $table->string('site_tagline')->nullable();
            $table->text('site_description')->nullable();

            $table->string('site_logo')->nullable();
            $table->string('site_favicon')->nullable();

            $table->string('primary_color')->default('#2563eb');
            $table->string('secondary_color')->default('#4f46e5');

            $table->string('hero_title')->nullable();
            $table->text('hero_subtitle')->nullable();
            $table->string('hero_button_text')->nullable();
            $table->string('hero_button_link')->nullable();

            $table->text('about_title')->nullable();
            $table->text('about_description')->nullable();

            $table->string('contact_email')->nullable();
            $table->string('contact_whatsapp')->nullable();
            $table->text('footer_text')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('affilio_settings');
    }
};