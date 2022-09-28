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
        Schema::create('apstatus', function (Blueprint $table) {
            $table->id();
            $table->string('apmac')->nullable();
            $table->string('time')->nullable();
            $table->string('bssid')->nullable();
            $table->string('wac')->nullable();
            $table->integer('h00')->nullable();
            $table->integer('h01')->nullable();
            $table->integer('h02')->nullable();
            $table->integer('h03')->nullable();
            $table->integer('h04')->nullable();
            $table->integer('h05')->nullable();
            $table->integer('h06')->nullable();
            $table->integer('h07')->nullable();
            $table->integer('h08')->nullable();
            $table->integer('h09')->nullable();
            $table->integer('h10')->nullable();
            $table->integer('h11')->nullable();
            $table->integer('h12')->nullable();
            $table->integer('h13')->nullable();
            $table->integer('h14')->nullable();
            $table->integer('h15')->nullable();
            $table->integer('h16')->nullable();
            $table->integer('h17')->nullable();
            $table->integer('h18')->nullable();
            $table->integer('h19')->nullable();
            $table->integer('h20')->nullable();
            $table->integer('h21')->nullable();
            $table->integer('h22')->nullable();
            $table->integer('h23')->nullable();
            $table->integer('total')->nullable();
            $table->timestamps();
            $table->unique(['apmac', 'time']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apstatus');
    }
};
