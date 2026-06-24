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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('label',length:50)->unique();
            $table->string('cover')->nullable();
            $table->string('images')->nullable();
            $table->integer('quantite')->unsigned();
            $table->integer('current_price')->unsigned();
            $table->text('description')->nullable();
            $table->string('slug')->nullable();
            $table->boolean('is_active')->default(false);
            $table->integer('categorie_id')->unsigned()->nullable();
            $table->foreign('categorie_id')->references('id')->on('categories')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
