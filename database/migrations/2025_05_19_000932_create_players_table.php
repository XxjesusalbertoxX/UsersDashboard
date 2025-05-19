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
        Schema::create('players', function (Blueprint $table) {
            $table->id('id_player');
            $table->string('name');
            $table->string('lastName');
            $table->integer('age');
            $table->enum('genre', ['male', 'female']);
            $table->unsignedBigInteger('id_team');
            $table->timestamps();

            $table->foreign('id_team')->references('id_team')->on('teams')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('players');
    }
};
