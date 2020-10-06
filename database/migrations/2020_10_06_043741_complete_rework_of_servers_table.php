<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CompleteReworkOfServersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('servers');

        Schema::create('servers', function (Blueprint $table) {
            $table->id();
            $table->string('provider_id')->unique();
            $table->string('name');
            $table->string('ip');
            $table->integer('port');
            $table->integer('players')->nullable();
            $table->integer('maxPlayers')->nullable();
            $table->integer('rank')->nullable();
            $table->string('status')->nullable();
            $table->string('map')->nullable();
            $table->integer('time')->nullable();
            $table->boolean('pve')->nullable();
            $table->boolean('modded')->nullable();
            $table->boolean('crossplay')->nullable();
            $table->boolean('private')->nullable();
            $table->string('computedCluster');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('servers');

        Schema::create('servers', function (Blueprint $table) {
            $table->id();
            $table->string('provider_id')->unique();
            $table->string('name');
            $table->string('address')->nullable();
            $table->string('ip');
            $table->integer('port');
            $table->string('portQuery')->nullable();
            $table->string('cluster')->nullable();
            $table->timestamps();
        });
    }
}
