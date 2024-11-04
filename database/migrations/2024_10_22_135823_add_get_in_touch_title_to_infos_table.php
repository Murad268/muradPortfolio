<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('infos', function (Blueprint $table) {
            $table->longText('get_in_touch_title')->change();
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
            // Optional: you can define the previous data type here if you want to revert the change
            $table->string('get_in_touch_title')->change(); // Example: assuming it was 'string'
        });
    }
};
