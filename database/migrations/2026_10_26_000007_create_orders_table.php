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
            $table->string('order_number', 50)->unique();
            $table->foreignId('table_session_id')->constrained('table_sessions')->cascadeOnDelete();
            $table->foreignId('table_id')->constrained('tables')->cascadeOnDelete();
            $table->string('customer_name', 100);
            $table->string('access_token', 64)->unique();
            $table->enum('status', [
                'pending',      // Menunggu Konfirmasi
                'processing',   // Diproses
                'served',       // Disajikan
                'completed',    // Selesai
                'rejected',     // Ditolak Admin
                'cancelled'     // Dibatalkan
            ])->default('pending');
            $table->enum('cancellation_status', ['none', 'requested', 'approved', 'rejected'])->default('none');
            $table->text('cancellation_reason')->nullable();
            $table->text('rejection_reason')->nullable();
            $table->text('notes')->nullable();
            $table->unsignedBigInteger('subtotal')->default(0);
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
