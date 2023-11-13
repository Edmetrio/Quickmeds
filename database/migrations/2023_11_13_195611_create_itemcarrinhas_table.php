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
        Schema::create('itemcarrinha', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('encomenda_id')->nullable();
            $table->foreign('encomenda_id')->references('id')->on('encomenda')->onDelete('cascade')->onUpdate('cascade');
            $table->uuid('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->uuid('produto_id')->nullable();
            $table->foreign('produto_id')->references('id')->on('produto')->onDelete('cascade')->onUpdate('cascade');
            $table->uuid('endereco_id')->nullable();
            $table->foreign('endereco_id')->references('id')->on('endereco')->onDelete('cascade')->onUpdate('cascade');
            $table->decimal('quantidade', 20,2)->nullable();
            $table->string('transporte')->default('true');
            $table->string('estado')->default('on');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itemcarrinha');
    }
};
