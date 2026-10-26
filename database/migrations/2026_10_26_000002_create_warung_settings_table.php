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
        Schema::create('warung_settings', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('Warung Enak');
            $table->text('description')->nullable();
            $table->text('address')->nullable();
            $table->string('phone_whatsapp', 25)->nullable();
            $table->text('maps_url')->nullable();
            $table->time('opening_time')->default('09:00:00');
            $table->time('closing_time')->default('22:00:00');
            $table->boolean('is_open')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warung_settings');
    }
};
