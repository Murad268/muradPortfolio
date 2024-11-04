<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('blog_categories', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable(); // Title sahəsi
            $table->string('seo_title')->nullable(); // SEO Title sahəsi
            $table->text('seo_keywords')->nullable(); // SEO Keywords sahəsi
            $table->text('seo_description')->nullable(); // SEO Description sahəsi
            $table->text('seo_links')->nullable(); // SEO Links sahəsi
            $table->text('seo_scripts')->nullable(); // SEO Scripts sahəsi
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
        Schema::dropIfExists('blog_categories');
    }
}
