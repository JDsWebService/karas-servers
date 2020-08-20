<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserProfileFieldsToUsersTable extends Migration
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
            $table->string('steam_id')->nullable()->unique();
            $table->string('epic_id')->nullable()->unique();
            // Section 2
            $table->string('youtube_url')->nullable()->unique();
            $table->string('twitch_url')->nullable()->unique();
            $table->string('facebook_url')->nullable()->unqiue();
            $table->string('battlemetrics_url')->nullable()->unqiue();
            // Section 3
            $table->text('bio')->nullable();
            // Section 4
            $table->integer('favorite_server_id')->nullable();
            $table->integer('home_server_id')->nullable();
            // Section 5
            $table->string('tribe_name')->nullable();
            $table->string('tribe_rank')->nullable();
            // Boolean Value for Early Access prior to 8/19/2020
            $table->boolean('early_access_member')->default(false);
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
            // Drop All Columns Added
            $table->dropColumn([
                'steam_id',
                'epic_id',
                'youtube_url',
                'twitch_url',
                'facebook_url',
                'battlemetrics_url',
                'bio',
                'favorite_server_id',
                'home_server_id',
                'tribe_name',
                'tribe_rank',
                'early_access_member'
            ]);
        });
    }
}
