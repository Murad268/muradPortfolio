<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSubtextFieldsToInfosTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('infos', function (Blueprint $table) {
            $table->text('subtext_portfolio')->nullable(); // Portfolio subtext sahəsi
            $table->text('subtext_blogs')->nullable(); // Blogs subtext sahəsi
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('infos', function (Blueprint $table) {
            $table->dropColumn('subtext_portfolio');
            $table->dropColumn('subtext_blogs');
        });
    }
}
