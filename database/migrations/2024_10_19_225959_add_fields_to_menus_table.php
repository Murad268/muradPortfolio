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
        Schema::table('menus', function (Blueprint $table) {
            // Yeni field-ləri buraya əlavə edin
            $table->string('seo_title')->nullable();
            $table->longText('meta_keywords')->nullable();
            $table->longText('meta_description')->nullable();
            $table->longText('seo_links')->nullable();
            $table->longText('seo_scripts')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('menus', function (Blueprint $table) {
            // Yeni əlavə olunan field-ləri geri silmək
            $table->dropColumn('seo_title');
            $table->dropColumn('meta_keywords');
            $table->dropColumn('meta_description');
            $table->dropColumn('seo_links');
            $table->dropColumn('seo_scripts');
        });
    }
};

