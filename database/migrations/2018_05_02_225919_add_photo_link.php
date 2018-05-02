<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPhotoLink extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('photo_ktp')->nullable();
            $table->string('photo_kk')->nullable();
            $table->string('photo_ktm')->nullable();
            $table->string('photo_sktm')->nullable();
            $table->string('photo_parent_sallary')->nullable();
            $table->string('photo_transcript_score')->nullable();
            $table->string('photo_active_student')->nullable();
            $table->string('photo_home_front')->nullable();
            $table->string('photo_home_side')->nullable();
            $table->string('photo_home_in')->nullable();
            $table->string('photo_home_out')->nullable();
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
            //
        });
    }
}
