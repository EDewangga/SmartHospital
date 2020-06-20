<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DoctorSeeder::class);
        $this->call(AppointmentTimeSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(MedicalSeeder::class);
        $this->call(RoomSeeder::class);
    }
}
