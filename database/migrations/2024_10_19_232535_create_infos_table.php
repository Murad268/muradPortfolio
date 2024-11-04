<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfosTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('infos', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('hero_image')->nullable();
            $table->string('about_image')->nullable();
            $table->string('hero_title')->nullable();
            $table->text('hero_description')->nullable();
            $table->text('hero_video')->nullable();
            $table->string('resume_file')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('instagram')->nullable();
            $table->string('facebook')->nullable();
            $table->string('github')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();
            $table->text('copyright_text')->nullable();
            $table->longText('about_text')->nullable();
            $table->integer('project_count')->nullable();
            $table->integer('worker_on_project_count')->nullable();
            $table->integer('client_reviews_count')->nullable();
            $table->integer('experience_year_count')->nullable();
            $table->text('hamburger_menu_about_text')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('infos');
    }
}
