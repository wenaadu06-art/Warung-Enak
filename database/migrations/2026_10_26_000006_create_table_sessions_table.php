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
        Schema::create('table_sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('table_id')->constrained('tables')->cascadeOnDelete();
            $table->string('session_code', 64)->unique();
            $table->string('customer_name', 100)->nullable();
            $table->enum('status', ['active', 'completed', 'cancelled'])->default('active');
            $table->unsignedBigInteger('total_amount')->default(0);
            $table->timestamp('opened_at')->useCurrent();
            $table->timestamp('closed_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_sessions');
    }
};
