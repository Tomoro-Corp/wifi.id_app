<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apdetail', function (Blueprint $table) {
            $table->id();
            $table->string('apmac');
            $table->string('apsn')->nullable();
            $table->string('aptype')->nullable();
            $table->string('apname')->nullable();
            $table->string('location')->nullable();
            $table->string('regional')->nullable();
            $table->string('witel')->nullable();
            $table->string('segmen1')->nullable();
            $table->string('segmen2')->nullable();
            $table->string('locid')->nullable();
            $table->string('namasite')->nullable();
            $table->string('skemabisnis')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->timestamps();
            $table->unique('apmac');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apdetail');
    }
};
