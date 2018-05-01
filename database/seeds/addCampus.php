<?php

use Illuminate\Database\Seeder;

class addCampus extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('institutions')->insert(array(
          array('id' => '1','institution_name' => 'Universitas Indonesia','updated_at' => '2017-08-19 22:54:56','created_at' => '2017-08-19 22:54:56'),
          array('id' => '2','institution_name' => 'Universitas Islam Negri Syarif Hidayatullah Jakarta','updated_at' => '2017-08-19 23:27:23','created_at' => '2017-08-19 23:27:23'),
          array('id' => '3','institution_name' => 'Universitas Negeri Jakarta','updated_at' => '2017-08-19 23:48:58','created_at' => '2017-08-19 23:48:58'),
          array('id' => '4','institution_name' => 'Politeknik Negeri Jakarta','updated_at' => '2017-07-26 11:29:56','created_at' => '2017-07-26 11:29:56'),

        ));
    }
}
