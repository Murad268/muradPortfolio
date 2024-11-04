<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIframeToInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('infos', function (Blueprint $table) {
            $table->text('iframe')->nullable()->after('hamburger_menu_about_text');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('infos', function (Blueprint $table) {
            $table->dropColumn('iframe');
        });
    }
}
