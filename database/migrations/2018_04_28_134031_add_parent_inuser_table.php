<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddParentInuserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('ayah_name')->nullable();
            $table->string('ayah_suku')->nullable();
            $table->string('ayah_tempat_lahir')->nullable();
            $table->date('ayah_tanggal_lahir')->nullable();
            $table->string('ayah_pendidikan')->nullable();
            $table->string('ayah_pekerjaan')->nullable();
            $table->boolean('ayah_tulangpunggung')->nullable();
            $table->integer('ayah_penghasilan')->nullable();
            $table->integer('ayah_tanggungan')->nullable();
            $table->string('ayah_alamat')->nullable();
            $table->string('ayah_phone')->nullable();
            $table->boolean('ayah_wafat')->nullable();

            $table->string('ibu_name')->nullable();
            $table->string('ibu_suku')->nullable();
            $table->string('ibu_tempat_lahir')->nullable();
            $table->date('ibu_tanggal_lahir')->nullable();
            $table->string('ibu_pendidikan')->nullable();
            $table->string('ibu_pekerjaan')->nullable();
            $table->boolean('ibu_tulangpunggung')->nullable();
            $table->integer('ibu_penghasilan')->nullable();
            $table->integer('ibu_tanggungan')->nullable();
            $table->string('ibu_alamat')->nullable();
            $table->string('ibu_phone')->nullable();
            $table->boolean('ibu_wafat')->nullable();




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
