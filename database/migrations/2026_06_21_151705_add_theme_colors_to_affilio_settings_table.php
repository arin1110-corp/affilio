<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('affilio_settings', function (Blueprint $table) {
            $table->string('base_color')->default('#020617')->after('secondary_color');
            $table->string('surface_color')->default('#0f172a')->after('base_color');
            $table->string('card_color')->default('#111827')->after('surface_color');
            $table->string('text_color')->default('#ffffff')->after('card_color');
            $table->string('muted_text_color')->default('#94a3b8')->after('text_color');
        });
    }

    public function down(): void
    {
        Schema::table('affilio_settings', function (Blueprint $table) {
            $table->dropColumn([
                'base_color',
                'surface_color',
                'card_color',
                'text_color',
                'muted_text_color',
            ]);
        });
    }
};