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
            $table->unsignedInteger('client_id');
            $table->timestamp('date');
            $table->unsignedInteger('amount')->default(0);
            $table->enum('delivery_status', ['PENDING', 'REJECT', 'START', 'DELIVRED'])->default('PENDING');
            $table->text('reject-reson')->nullable();
            $table->timestamps();
            $table->foreign('client_id')->references('id')->on('clients');

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
