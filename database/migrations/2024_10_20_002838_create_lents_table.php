<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLentsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lents', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable(); // Title sahəsi
            $table->integer('order')->nullable(); // Order sahəsi
            $table->boolean('status')->default(true); // Status sahəsi
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lents');
    }
}
