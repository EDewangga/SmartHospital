<?php

use Illuminate\Database\Seeder;
use bfinlay\SpreadsheetSeeder\SpreadsheetSeeder;
use Illuminate\Support\Facades\DB;

class MedicalSeeder extends SpreadsheetSeeder
{
   /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            SpreadsheetSeeder::class,
        ]);
    }
}
