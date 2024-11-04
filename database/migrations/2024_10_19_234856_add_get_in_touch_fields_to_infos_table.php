<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGetInTouchFieldsToInfosTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('infos', function (Blueprint $table) {
            $table->string('get_in_touch_title')->nullable(); // "Get in Touch" başlığı üçün sahə
            $table->text('get_in_touch_description')->nullable(); // "Get in Touch" açıqlaması üçün sahə
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('infos', function (Blueprint $table) {
            $table->dropColumn('get_in_touch_title');
            $table->dropColumn('get_in_touch_description');
        });
    }
}
