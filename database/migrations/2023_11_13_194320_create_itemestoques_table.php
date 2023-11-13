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
        Schema::create('itemestoque', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('estoque_id')->nullable();
            $table->foreign('estoque_id')->references('id')->on('estoque')->onDelete('cascade')->onUpdate('cascade');
            $table->uuid('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->decimal('quantidade', 20,2)->nullable();
            $table->decimal('montante', 20,2)->nullable();
            $table->string('estado')->default('on');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itemestoque');
    }
};
