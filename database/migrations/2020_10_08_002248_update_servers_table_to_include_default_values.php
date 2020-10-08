<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateServersTableToIncludeDefaultValues extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('servers', function (Blueprint $table) {
            $table->integer('players')->nullable()->default(0)->change();
            $table->integer('maxPlayers')->nullable()->default(0)->change();
            $table->integer('rank')->nullable()->default(0)->change();
            $table->string('status')->nullable()->default('')->change();
            $table->string('map')->nullable()->default('')->change();
            $table->integer('time')->nullable()->default(0)->change();
            $table->boolean('pve')->nullable()->default(1)->change();
            $table->boolean('modded')->nullable()->default(1)->change();
            $table->boolean('crossplay')->nullable()->default(1)->change();
            $table->boolean('private')->nullable()->default(1)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('servers', function (Blueprint $table) {
            $table->integer('players')->nullable()->change();
            $table->integer('maxPlayers')->nullable()->change();
            $table->integer('rank')->nullable()->change();
            $table->string('status')->nullable()->change();
            $table->string('map')->nullable()->change();
            $table->integer('time')->nullable()->change();
            $table->boolean('pve')->nullable()->change();
            $table->boolean('modded')->nullable()->change();
            $table->boolean('crossplay')->nullable()->change();
            $table->boolean('private')->nullable()->change();
        });
    }
}
