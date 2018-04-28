<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSomeInUsersAgain extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nik_ktp')->nullable();
            $table->integer('body_length')->nullable();
            $table->integer('body_weight')->nullable();
            $table->string('instagram_id')->nullable();
            $table->string('line_id')->nullable();
            $table->string('nip_mahasiswa')->after('university_id')->nullable();
            $table->year('generation')->nullable();
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
