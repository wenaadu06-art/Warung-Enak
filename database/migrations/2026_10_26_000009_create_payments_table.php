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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number', 50)->unique();
            $table->foreignId('table_session_id')->constrained('table_sessions')->cascadeOnDelete();
            $table->enum('payment_method', ['cash', 'qris']);
            $table->unsignedBigInteger('total_amount');
            $table->unsignedBigInteger('amount_paid');
            $table->unsignedBigInteger('change_amount')->default(0);
            $table->enum('status', ['pending', 'paid', 'cancelled'])->default('paid');
            $table->timestamp('paid_at')->nullable();
            $table->text('cashier_notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
