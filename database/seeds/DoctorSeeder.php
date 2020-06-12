<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('doctors')->insert(array(
            array(
                'nama' => 'Dr. Rehaan Dickerson','specialis' => 'Dokter Umum','lokasi' => 'Rumah Sakit A'
            ),
            array(
                'nama' => 'Dr. Winifred Beaumont','specialis' => 'Dokter Umum','lokasi' => 'Rumah Sakit A'
            ),
            array(
                'nama' => 'Dr. Carley Watkins','specialis' => 'Dokter anak','lokasi' => 'Rumah Sakit A'
            ),
            array(
                'nama' => 'Dr. Mujtaba Preece','specialis' => 'Dokter Umum','lokasi' => 'Rumah Sakit A'
            ),
            array(
                'nama' => 'Dr. Lorcan Walter','specialis' => 'Dokter Umum','lokasi' => 'Rumah Sakit B'
            ),
            array(
                'nama' => 'Dr. Thierry Booker','specialis' => 'Psikiater','lokasi' => 'Rumah Sakit B'
            ),
            array(
                'nama' => 'Dr. Lucille Church','specialis' => 'Dokter anak','lokasi' => 'Rumah Sakit B'
            ),
            array(
                'nama' => 'Dr. Macauley Reyes','specialis' => 'Dokter THT','lokasi' => 'Rumah Sakit B'
            ), array(
                'nama' => 'Dr. Alara Kline','specialis' => 'Dokter Umum','lokasi' => 'Rumah Sakit C'
            ),
            array(
                'nama' => 'Dr. Jorge Timms','specialis' => 'Dokter Umum','lokasi' => 'Rumah Sakit C'
            ),
            array(
                'nama' => 'Dr. Nisha Murillo','specialis' => 'Dokter anak','lokasi' => 'Rumah Sakit C'
            ),
            array(
                'nama' => 'Dr. Ana Barlow','specialis' => 'Dokter THT','lokasi' => 'Rumah Sakit C'
            ),

        ));

    }
}
