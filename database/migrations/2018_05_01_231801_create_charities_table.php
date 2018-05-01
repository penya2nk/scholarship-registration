<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charities', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softdeletes();
            $table->integer('user_id')->unsigned();
            $table->string('role')->nullable();// peran
            $table->string('activity_name')->nullable(); //Nama Aktivitas
            $table->string('location')->nullable();
            $table->date('date_from')->nullable();
            $table->date('date_end')->nullable();
            $table->integer('person_impacted')->nullable(); // orang
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('charities');
    }
}
