<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->datetime('date')->nullable();
            $table->string('image')->nullable();
            $table->longText('text')->nullable();
            $table->string('inner_image')->nullable();
            $table->longText('tags')->nullable();
            $table->integer('category_id')->unsigned();
            $table->string('seo_title')->nullable();
            $table->text('seo_keywords')->nullable();
            $table->text('seo_description')->nullable();
            $table->longText('seo_links')->nullable(); // Non-translatable
            $table->longText('seo_scripts')->nullable(); // Non-translatable
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
}
