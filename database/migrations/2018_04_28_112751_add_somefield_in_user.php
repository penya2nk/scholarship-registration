<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSomefieldInUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nickname')->after('name')->nullable();
            $table->string('phone')->nullable();
            $table->integer('status')->default(0);
            $table->integer('userlevel')->nullable();
            $table->text('address')->nullable();
            $table->text('address_format')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->string('country')->nullable();
            $table->text('about_me')->nullable();
            $table->text('lat')->nullable();
            $table->text('long')->nullable();
            $table->string('born_place')->nullable();
            $table->date('born_date')->nullable();
            $table->integer('anak_ke')->nullable();
            $table->integer('bersaudara')->nullable();
            $table->integer('university_id')->unsigned()->nullable();
            $table->string('faculty')->nullable();
            $table->string('mayor')->nullable();

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
