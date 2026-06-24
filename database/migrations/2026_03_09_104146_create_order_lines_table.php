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
        Schema::create('order_lines', function (Blueprint $table) {
            $table->unsignedInteger('price');
            $table->unsignedInteger('quantity');
            $table->unsignedInteger('amount');
            $table->unsignedInteger('order_id');
            $table->unsignedInteger('article_id');
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade')->nullable();
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('set null')->nullable();
            $table->primary(['order_id' ,'article_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_lines');
    }
};
