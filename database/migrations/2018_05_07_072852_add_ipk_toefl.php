<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIpkToefl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->decimal('ip_1')->nullable();
            $table->decimal('ip_2')->nullable();
            $table->decimal('ip_3')->nullable();
            $table->decimal('ip_4')->nullable();
            $table->decimal('ipk_1')->nullable();
            $table->decimal('ipk_2')->nullable();
            $table->decimal('ipk_3')->nullable();
            $table->decimal('ipk_4')->nullable();
            $table->integer('toefl')->nullable();

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
