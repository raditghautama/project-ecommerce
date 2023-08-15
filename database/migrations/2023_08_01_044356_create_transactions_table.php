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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->integer('total_amount');
            $table->enum('status', ['in_cart', 'in_progress', 'on_delivery', 'success', 'cancelled'])->default('in_cart');
            $table->text('address')->nullable();
            $table->string('proof_of_payment')->nullable();
            $table->string('bank_name')->nullable();
            $table->text('notes')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
