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
    Schema::create('affilio_orders', function (Blueprint $table) {
        $table->id('order_id');
        $table->uuid('order_uid')->unique();

        $table->string('order_code')->unique();

        $table->unsignedBigInteger('order_user_id');
        $table->unsignedBigInteger('order_store_id');
        $table->unsignedBigInteger('order_package_id');

        $table->decimal('order_amount', 18, 2);
        $table->string('order_status')->default('Menunggu Pembayaran');

        $table->string('midtrans_snap_token')->nullable();
        $table->string('midtrans_transaction_id')->nullable();
        $table->string('midtrans_payment_type')->nullable();
        $table->string('midtrans_transaction_status')->nullable();
        $table->text('midtrans_response')->nullable();

        $table->timestamp('paid_at')->nullable();

        $table->timestamps();

        $table->foreign('order_user_id')->references('user_id')->on('affilio_users')->onDelete('cascade');
        $table->foreign('order_store_id')->references('store_id')->on('affilio_stores')->onDelete('cascade');
        $table->foreign('order_package_id')->references('package_id')->on('affilio_packages')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('affilio_orders');
    }
};