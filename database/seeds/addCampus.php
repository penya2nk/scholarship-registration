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
          array('id' => '1','institution_name' => 'Universitas Indonesia (UI)'),
          array('id' => '2','institution_name' => 'Universitas Negeri Jakarta (UNJ)'),
          array('id' => '3','institution_name' => 'Universitas Islam Negeri (UIN Jakarta)'),
          array('id' => '4','institution_name' => 'Politeknik Negeri Jakarta (PNJ)'),
          array('id' => '5','institution_name' => 'Polimedia Kreatif Jakarta (POLMED)'),
          array('id' => '6','institution_name' => 'Akademi Pimpinan Perusahaan (APP)'),
        ));
    }
}
