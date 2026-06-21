<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('affilio_package_features', function (Blueprint $table) {
            $table->id('feature_id');
            $table->unsignedBigInteger('feature_package_id');
            $table->string('feature_text');
            $table->integer('feature_order')->default(0);
            $table->timestamps();

            $table->foreign('feature_package_id')
                ->references('package_id')
                ->on('affilio_packages')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('affilio_package_features');
    }
};