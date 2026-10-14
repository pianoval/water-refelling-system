<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->string('customer_name');
            $table->string('customer_email')->nullable();

            $table->string('product_name');
            $table->unsignedInteger('quantity');

            $table->decimal('total_amount', 10, 2);

            $table->text('delivery_address')->nullable();
            $table->string('phone_number')->nullable();

            $table->enum('status', [
                'Pending',
                'Confirmed',
                'Preparing',
                'Out for Delivery',
                'Delivered',
                'Cancelled'
            ])->default('Pending');

            $table->date('order_date')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};