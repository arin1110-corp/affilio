<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('affilio_packages', function (Blueprint $table) {
            $table->id('package_id');
            $table->uuid('package_uid')->unique();

            $table->string('package_name');
            $table->string('package_slug')->unique();

            $table->text('package_description')->nullable();

            $table->decimal('package_price', 18, 2)->default(0);
            $table->integer('package_duration_month')->default(3);

            $table->integer('package_limit_user')->nullable();
            $table->integer('package_order')->default(0);

            $table->boolean('can_use_subdomain')->default(true);
            $table->boolean('can_manage_product')->default(true);
            $table->boolean('can_manage_category')->default(true);
            $table->boolean('can_manage_social')->default(true);
            $table->boolean('can_manage_theme')->default(true);
            $table->boolean('can_receive_order')->default(false);

            $table->string('package_badge')->nullable();
            $table->string('package_status')->default('Aktif');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('affilio_packages');
    }
};