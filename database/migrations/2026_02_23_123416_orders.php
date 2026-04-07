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
        schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('order_code')->unique();
            $table->integer('total_amount');
            $table->string('status')->default('pending');
            $table->string('no_hp')->nullable();
            $table->enum('pengiriman', ['jne', 'jt', 'sicepat', 'kurir_kami'])->default('kurir_kami');
            $table->string('alamat')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('midtrans_order_id')->nullable();
            $table->string('midtrans_transaction_id')->nullable();
            $table->json('midtrans_response')->nullable();
            $table->timestamp('payment_time')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        schema::dropIfExists('orders');
    }
};
