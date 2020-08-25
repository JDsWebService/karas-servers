<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeUsersTableToNonUniqueValues extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Section 1
            $table->string('steam_id')->nullable()->change();
            $table->string('epic_id')->nullable()->change();
            // Section 2
            $table->string('youtube_url')->nullable()->change();
            $table->string('twitch_url')->nullable()->change();
            $table->string('facebook_url')->nullable()->change();
            $table->string('battlemetrics_url')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Section 1
            $table->string('steam_id')->nullable()->unique()->change();
            $table->string('epic_id')->nullable()->unique()->change();
            // Section 2
            $table->string('youtube_url')->nullable()->unique()->change();
            $table->string('twitch_url')->nullable()->unique()->change();
            $table->string('facebook_url')->nullable()->unique()->change();
            $table->string('battlemetrics_url')->nullable()->unique()->change();
        });
    }
}
