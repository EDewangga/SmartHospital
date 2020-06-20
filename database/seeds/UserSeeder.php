<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $doctorIDs = DB::table('doctors')->pluck('id');
        $password = Hash::make('123');
        DB::table('users')->insert(array(
            array(
                'name' => 'Dr. Rehaan Dickerson','email' => 'RehaanDickerson@gmail.com','NIK' => '451251512','password' => $password, 'rules' => '2','doctor_id' => $doctorIDs[0],
            ),
            array(
                'name' => 'Dr. Winifred Beaumont','email' => 'WinifredBeaumont@gmail.com','NIK' => '451255312','password' => $password, 'rules' => '2','doctor_id' => $doctorIDs[1],
            ),
            array(
                'name' => 'Dr. Carley Watkins','email' => 'CarleyWatkins@gmail.com','NIK' => '4512585612','password' => $password, 'rules' => '2','doctor_id' => $doctorIDs[2],
            ),
            array(
                'name' => 'Dr. Mujtaba Preece','email' => 'MujtabaPreece@gmail.com','NIK' => '451287512','password' => $password, 'rules' => '2','doctor_id' => $doctorIDs[3],
            ),
            array(
                'name' => 'Dr. Lorcan Walter','email' => 'LorcanWalter@gmail.com','NIK' => '45114231512','password' => $password, 'rules' => '2','doctor_id' => $doctorIDs[4],
            ),
            array(
                'name' => 'Dr. Thierry Booker','email' => 'ThierryBooker@gmail.com','NIK' => '4512856812','password' => $password, 'rules' => '2','doctor_id' => $doctorIDs[5],
            ),
            array(
                'name' => 'Dr. Lucille Church','email' => 'LucilleChurch@gmail.com','NIK' => '45412451512','password' => $password, 'rules' => '2','doctor_id' => $doctorIDs[6],
            ),
            array(
                'name' => 'Dr. Macauley Reyes','email' => 'MacauleyReyes@gmail.com','NIK' => '45128745812','password' => $password, 'rules' => '2','doctor_id' => $doctorIDs[7],
            ),
            array(
                'name' => 'Dr. Alara Kline','email' => 'AlaraKline@gmail.com','NIK' => '4512512515512','password' => $password, 'rules' => '2','doctor_id' => $doctorIDs[8],
            ),
            array(
                'name' => 'Dr. Jorge Timms','email' => 'JorgeTimms@gmail.com','NIK' => '31125123','password' => $password, 'rules' => '2','doctor_id' => $doctorIDs[9],
            ),
            array(
                'name' => 'Dr. Nisha Murillo','email' => 'NishaMurillo@gmail.com','NIK' => '451421512','password' => $password, 'rules' => '2','doctor_id' => $doctorIDs[10],
            ),
            array(
                'name' => 'Dr. Ana Barlow','email' => 'AnaBarlow@gmail.com','NIK' => '521551512','password' => $password, 'rules' => '2','doctor_id' => $doctorIDs[11],
            ),
        ));
    }
}
