<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAboutSectionTitleToInfosTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('infos', function (Blueprint $table) {
            $table->string('about_section_title')->nullable(); // About section üçün title sahəsi əlavə edilir
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('infos', function (Blueprint $table) {
            $table->dropColumn('about_section_title'); // Əlavə edilən sütun silinir
        });
    }
}
