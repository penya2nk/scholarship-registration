<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompetitionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competitions', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softdeletes();
            $table->integer('user_id')->unsigned();
            $table->string('level')->nullable();
            $table->string('type')->nullable();// individu/ kelompok
            $table->string('title')->nullable(); //gelar juara
            $table->string('competition_name')->nullable();
            $table->string('location')->nullable();
            $table->year('year')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('competitions');
    }
}
