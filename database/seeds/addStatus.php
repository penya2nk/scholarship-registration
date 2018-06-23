<?php

use Illuminate\Database\Seeder;

class addStatus extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('statuses')->insert(array(
        array('status_order' => '1', 'color' => '#a72828', 'status_name' => 'Registered'),
        array('status_order' => '2', 'color' => '#227587', 'status_name' => 'Seleksi Berkas/Administrasi'),
        array('status_order' => '3', 'color' => '#223887', 'status_name' => 'Tes Tulis'),
        array('status_order' => '4', 'color' => '#87227d', 'status_name' => 'Tes FGD'),
        array('status_order' => '5', 'color' => '#4d4d4d', 'status_name' => 'Tes Wawancara'),
        array('status_order' => '6', 'color' => '#228723', 'status_name' => 'Penerima Beasiswa'),
      ));
    }
}
