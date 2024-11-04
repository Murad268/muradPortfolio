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
        // Cədvəlin adını dəyişir
        Schema::rename('here_strings', 'hero_strings');

        // Yeni sütunlar əlavə edir
        Schema::table('hero_strings', function (Blueprint $table) {
            $table->integer('order')->nullable(); // Sıralama üçün 'order' sütunu
            $table->boolean('status')->default(true); // Aktiv olub-olmamasını göstərən 'status' sütunu
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Yeni sütunları silir
        Schema::table('hero_strings', function (Blueprint $table) {
            $table->dropColumn('order');
            $table->dropColumn('status');
        });

        // Cədvəlin adını geri qaytarır
        Schema::rename('hero_strings', 'here_strings');
    }
};

