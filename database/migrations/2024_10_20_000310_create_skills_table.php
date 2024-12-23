<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkillsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->integer('percentage')->nullable();
            $table->integer('order')->nullable(); // Sıra nömrəsi üçün order sahəsi
            $table->boolean('status')->default(true); // Aktiv/deaktiv üçün status sahəsi
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skills');
    }
}
