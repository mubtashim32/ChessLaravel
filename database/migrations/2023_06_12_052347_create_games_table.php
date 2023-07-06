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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('player1');
            $table->bigInteger('player2')->nullable();
            $table->string('username1')->nullable();
            $table->string('username2')->nullable();
            $table->integer('rating1')->nullable();
            $table->integer('rating2')->nullable();
            $table->string('status');
            $table->integer('winner')->nullable();
            $table->integer('moves')->nullable();
            $table->timestamp('started_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
