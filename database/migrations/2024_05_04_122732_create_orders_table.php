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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('shipping_address_id')->nullable()->constrained()->nullOnDelete();
            $table->string('order_number')->unique();
            $table->string('customer_name')->nullable();
            $table->string('customer_email')->nullable();
            $table->string('customer_phone')->nullable();
            $table->text('address')->nullable();
            $table->foreignId('discount_id')->nullable()->constrained()->nullOnDelete();
            $table->decimal('tax', 10, 2)->nullable();
            $table->decimal('shipping_fee', 10, 2)->nullable();
            $table->string('payment_gateway')->nullable();
            $table->string('payment_id')->nullable();
            $table->text('notes')->nullable();
            $table->decimal('subtotal', 10, 2);
            $table->decimal('total', 10, 2)->nullable();
            $table->boolean('is_paid')->default(false);
            $table->string('status')->default('pending');
            $table->string('tracking_number')->nullable(); // added after order is paid.
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
