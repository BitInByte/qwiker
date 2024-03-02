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
        Schema::create('qwikers', function (Blueprint $table) {
            // $table->id();
            $table->uuid('id')->primary();
            $table->string('message', 250);
            $table->string('slug')->unique();
            $table->integer('likes')->default(0);
            $table->integer('shares')->default(0);
            $table->timestamps();
            $table->foreignUuid('user_id')->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qwikers');
    }
};
