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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->float('amount');
            $table->foreignId('colocation_id')->constrained()->cascadeOnDelete();
            $table->foreignId('categorie_id')->constrained()->cascadeOnDelete();
            $table->foreignId('payer_colocationuser_id')->constrained('colocation_users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
