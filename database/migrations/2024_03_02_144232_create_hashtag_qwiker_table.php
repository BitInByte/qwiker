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
        Schema::create('hashtag_qwiker', function (Blueprint $table) {
            $table->uuid('hashtag_id');
            $table->uuid('qwiker_id');
            // $table->id();
            // $table->timestamps();
            $table->foreign('hashtag_id')->references('id')->on('hashtags')->onDelete('cascade');
            $table->foreign('qwiker_id')->references('id')->on('qwikers')->onDelete('cascade');
            $table->primary(['hashtag_id', 'qwiker_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hashtag_qwiker');
    }
};
