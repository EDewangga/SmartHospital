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
        // $this->call([
        //     SpreadsheetSeeder::class,
        // ]);
        DB::table('medicals')->insert(array(
            array('nama' => 'Alprazolam 1 mg', 'harga' => 128, 'jenis' => 'Obat Jiwa', 'bentuk' => 'Tablet'),
            array('nama' => 'Amitriptiline 25 mg', 'harga' => 167, 'jenis' => 'Obat Jiwa', 'bentuk' => 'Tablet'),
            array('nama' => 'Asam Valproat 250mg / 5 ml', 'harga' => 15789, 'jenis' => 'Obat Jiwa', 'bentuk' => 'Tablet'),
            array('nama' => 'Carbamazepin 200 mg', 'harga' => 230, 'jenis' => 'Obat Jiwa', 'bentuk' => 'Tablet'),
            array('nama' => 'Chlorpromazine 100 mg', 'harga' => 157, 'jenis' => 'Obat Jiwa', 'bentuk' => 'Tablet'),
            array('nama' => 'Clobazam 10 mg', 'harga' => 739, 'jenis' => 'Obat Jiwa', 'bentuk' => 'Tablet'),
            array('nama' => 'Clonazepam 2 mg', 'harga' => 5271, 'jenis' => 'Obat Jiwa', 'bentuk' => 'Tablet'),
            array('nama' => 'Clozapine 100 mg', 'harga' => 3288, 'jenis' => 'Obat Jiwa', 'bentuk' => 'Tablet'),
            array('nama' => 'Clozapine 25 mg', 'harga' => 1121, 'jenis' => 'Obat Jiwa', 'bentuk' => 'Tablet'),
            array('nama' => 'Diazepam 5 mg', 'harga' => 109, 'jenis' => 'Obat Jiwa', 'bentuk' => 'Tablet'),
            array('nama' => 'Gabapentin 300 mg', 'harga' => 1000, 'jenis' => 'Obat Jiwa', 'bentuk' => 'Tablet'),
            array('nama' => 'Haloperidol 1mg', 'harga' => 54, 'jenis' => 'Obat Jiwa', 'bentuk' => 'Tablet'),
            array('nama' => 'Haloperidol 5 mg', 'harga' => 56, 'jenis' => 'Obat Jiwa', 'bentuk' => 'Tablet'),
            array('nama' => 'Lorazepam 2 mg', 'harga' => 864, 'jenis' => 'Obat Jiwa', 'bentuk' => 'Tablet'),
            array('nama' => 'Methylphenidate HCl 10 mg', 'harga' => 1162, 'jenis' => 'Obat Jiwa', 'bentuk' => 'Tablet'),
            array('nama' => 'Olanzapine 10 mg', 'harga' => 4725, 'jenis' => 'Obat Jiwa', 'bentuk' => 'Tablet'),
            array('nama' => 'Phenobarbital 30 mg', 'harga' => 171, 'jenis' => 'Obat Jiwa', 'bentuk' => 'Tablet'),
            array('nama' => 'Piracetam 400 mg', 'harga' => 316, 'jenis' => 'Obat Jiwa', 'bentuk' => 'Tablet'),
            array('nama' => 'Risperidone 2 mg ', 'harga' => 287, 'jenis' => 'Obat Jiwa', 'bentuk' => 'Tablet'),
            array('nama' => 'Risperidone 3 mg / Dexa', 'harga' => 419, 'jenis' => 'Obat Jiwa', 'bentuk' => 'Tablet'),
            array('nama' => 'Sertraline 50 mg', 'harga' => 1736, 'jenis' => 'Obat Jiwa', 'bentuk' => 'Tablet'),
            array('nama' => 'Trifluoperazine 5 mg', 'harga' => 287, 'jenis' => 'Obat Jiwa', 'bentuk' => 'Tablet'),
            array('nama' => 'Trihexyphenidil 2 mg', 'harga' => 91, 'jenis' => 'Obat Jiwa', 'bentuk' => 'Tablet'),
            array('nama' => 'Diazepam 5 mg', 'harga' => 1735, 'jenis' => 'Obat Jiwa', 'bentuk' => 'Injeksi'),
            array('nama' => 'Midazolam - Hamein 5 mg ', 'harga' => 7887, 'jenis' => 'Obat Jiwa', 'bentuk' => 'Injeksi'),
            array('nama' => 'Phenobarbital 50 mg', 'harga' => 1969, 'jenis' => 'Obat Jiwa', 'bentuk' => 'Injeksi'),
            array('nama' => 'Phenytoin Sodium inj', 'harga' => 4956, 'jenis' => 'Obat Jiwa', 'bentuk' => 'Injeksi'),
            array('nama' => 'Piracetam 3 gr / 15 ml', 'harga' => 8000, 'jenis' => 'Obat Jiwa', 'bentuk' => 'Injeksi'),
            array('nama' => 'Codein 10 mg', 'harga' => 571, 'jenis' => 'Narkotika', 'bentuk' => 'Tablet'),
            array('nama' => 'Amoxicillin 500 mg', 'harga' => 233, 'jenis' => 'Anti Biotika', 'bentuk' => 'Tablet'),
            array('nama' => 'Azithromycin 250 mg', 'harga' => 3278, 'jenis' => 'Anti Biotika', 'bentuk' => 'Tablet'),
            array('nama' => 'Azithromycin 500 mg', 'harga' => 1778, 'jenis' => 'Anti Biotika', 'bentuk' => 'Tablet'),
            array('nama' => 'Cefadroxile 500 mg', 'harga' => 510, 'jenis' => 'Anti Biotika', 'bentuk' => 'Tablet'),
            array('nama' => 'Cefadroxile syr kering 125 mg/5 ml', 'harga' => 4485, 'jenis' => 'Anti Biotika', 'bentuk' => 'Tablet'),
            array('nama' => 'Cefixime 200 mg', 'harga' => 2200, 'jenis' => 'Anti Biotika', 'bentuk' => 'Tablet'),
            array('nama' => 'Cefixime syr kering 100 mg / 5 ml', 'harga' => 5530, 'jenis' => 'Anti Biotika', 'bentuk' => 'Tablet'),
            array('nama' => 'Chloramphenicol 250 mg', 'harga' => 310, 'jenis' => 'Anti Biotika', 'bentuk' => 'Tablet'),
            array('nama' => 'Ciprofloxacin 500 mg', 'harga' => 265, 'jenis' => 'Anti Biotika', 'bentuk' => 'Tablet'),
            array('nama' => 'Cotrimoxazole 480 mg', 'harga' => 152, 'jenis' => 'Anti Biotika', 'bentuk' => 'Tablet'),
            array('nama' => 'Fluconazole 150 mg', 'harga' => 18720, 'jenis' => 'Anti Biotika', 'bentuk' => 'Tablet'),
            array('nama' => 'Levofloxacin 500 mg', 'harga' => 495, 'jenis' => 'Anti Biotika', 'bentuk' => 'Tablet'),
            array('nama' => 'Rifampicin 450 mg', 'harga' => 897, 'jenis' => 'Anti Biotika', 'bentuk' => 'Tablet'),
            array('nama' => 'Thiamphenicol 500 mg', 'harga' => 615, 'jenis' => 'Anti Biotika', 'bentuk' => 'Tablet'),
            array('nama' => 'Cefotaxime 1 gr inj', 'harga' => 4482, 'jenis' => 'Anti Biotika', 'bentuk' => 'Injeksi'),
            array('nama' => 'Ceftazidime 1 gr', 'harga' => 12789, 'jenis' => 'Anti Biotika', 'bentuk' => 'Injeksi'),
            array('nama' => 'Ceftriaxon sodium 1 gr', 'harga' => 4708, 'jenis' => 'Anti Biotika', 'bentuk' => 'Injeksi'),
            array('nama' => 'Gentamycin inj', 'harga' => 3083, 'jenis' => 'Anti Biotika', 'bentuk' => 'Injeksi'),
            array('nama' => 'Levofloxacin 500 mg inf', 'harga' => 17998, 'jenis' => 'Anti Biotika', 'bentuk' => 'Injeksi'),
            array('nama' => 'Metronidazol 500 mg/ 100 ml inf', 'harga' => 8110, 'jenis' => 'Anti Biotika', 'bentuk' => 'Injeksi'),
            array('nama' => 'Chloramphenicol 1 % SM', 'harga' => 1881, 'jenis' => 'Anti Biotika', 'bentuk' => 'Injeksi'),
            array('nama' => 'Gentamycin 0', 'harga' => 1881, 'jenis' => 'Anti Biotika', 'bentuk' => 'Injeksi'),
            array('nama' => 'Acarbose 100 mg', 'harga' => 779, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Acarbose 50 mg', 'harga' => 562, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Acetyl cysteine / N - Asetil sistein 200 mg', 'harga' => 373, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Acyclovir 200 mg', 'harga' => 249, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Allopurinol 100 mg', 'harga' => 99, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Ambroxol 30 mg', 'harga' => 155, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Amlodipin 10 mg', 'harga' => 93, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Amlodipin 5 mg', 'harga' => 70, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Antalgin 500 mg', 'harga' => 257, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Antasid DOEN', 'harga' => 54, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Antasid DOEN suspensi', 'harga' => 1995, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Asam Mefenamat 500 mg', 'harga' => 103, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Asam Ursodeoksikolat 250 mg', 'harga' => 2139, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Atorvastatin 10 mg', 'harga' => 1100, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Betahistine mesylate 6 mg', 'harga' => 149, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Bisoprolol 5 mg', 'harga' => 260, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Calcium Lactat 500 mg', 'harga' => 63, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Candesartan 8 mg', 'harga' => 545, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Captopril 25 mg', 'harga' => 68, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Captopril 50 mg', 'harga' => 125, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Cetirizin 10 mg', 'harga' => 90, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Citicoline 500 mg', 'harga' => 4620, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Clonidine 0', 'harga' => 4620, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Clopidogrel 75 mg', 'harga' => 1404, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'CTM 4 mg', 'harga' => 42, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Digoxin 0', 'harga' => 50, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Dimenhydrinate 50 mg', 'harga' => 105, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Domperidone 10 mg', 'harga' => 85, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Domperidone Suspensi 5 mg/5 ml 60 ml', 'harga' => 2701, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Eperisone HCl 50 mg', 'harga' => 1015, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Ethambutol 500 mg', 'harga' => 745, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Fenofibrate 100 mg', 'harga' => 1191, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Fenofibrate 300 mg', 'harga' => 1446, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Folic Acid ', 'harga' => 70, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Furosemide 40 mg', 'harga' => 77, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Gemfibrozil 300 mg', 'harga' => 371, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Glibenclamide 5 mg', 'harga' => 90, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Glimepiride 4 mg', 'harga' => 270, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Gliquidone 30 mg', 'harga' => 1075, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Glyceryl guaiacolat 100 mg', 'harga' => 156, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Griseofulvin 500 mg', 'harga' => 848, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'HCT 25 mg', 'harga' => 128, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Ibuprofen 200 mg', 'harga' => 215, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Isosorbit Dinitrat 5 mg', 'harga' => 89, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Kalium Diklofenak 50 mg', 'harga' => 425, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Ketoconazole 200 mg', 'harga' => 307, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Lansoprazole 30 mg', 'harga' => 323, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Lisinopril tab 10 mg', 'harga' => 259, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Loperamide 2 mg', 'harga' => 95, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Mecobalamine 500 mcg', 'harga' => 501, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Meloxicam 15 mg', 'harga' => 617, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Metformin 500 mg', 'harga' => 96, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Methylprednisolon 4 mg', 'harga' => 150, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Methylprednisolon 8 mg', 'harga' => 300, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Metoclopramide 10 mg', 'harga' => 90, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'NaDiklofenak 50 mg', 'harga' => 115, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Nifedipin 10 mg', 'harga' => 104, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Nystatin 500000 IU TSG', 'harga' => 790, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'O B H Syr', 'harga' => 4175, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Omeprazole 20 mg', 'harga' => 130, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Ondansetron 4 mg', 'harga' => 385, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Ondansetron 8 mg', 'harga' => 351, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Oralit 200 mg', 'harga' => 257, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Paracethamol 500 mg', 'harga' => 53, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Paracethamol 120 mg/5 ml 60 ml syr', 'harga' => 1107, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Phytomenadione 10 mg/ Vit K1', 'harga' => 1001, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Piroxicam 20 mg', 'harga' => 156, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Prednison 5 mg', 'harga' => 162, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Pyrantel 125 mg', 'harga' => 405, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Pyrazinamide 500 mg', 'harga' => 237, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Ramipril tab 2', 'harga' => 240, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Ramipril tab 5 mg', 'harga' => 245, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Ranitidine 150 mg', 'harga' => 165, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Salbutamol 4 mg', 'harga' => 83, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Simvastatin 10 mg', 'harga' => 117, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Simvastatin 20 mg', 'harga' => 205, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Spironolakton 100 mg', 'harga' => 1000, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Spironolakton 25 mg', 'harga' => 208, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Sukralfat suspensi 500 mg/ 5 ml', 'harga' => 6789, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Valsartan tab 160 mg ', 'harga' => 998, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Valsartan tab 80 mg ', 'harga' => 655, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Vit B Complex', 'harga' => 89, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Vit B1 50 mg', 'harga' => 91, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Vit B12 500 mcq', 'harga' => 46, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Vit B6 10 mg', 'harga' => 123, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Vit C 50 mg', 'harga' => 105, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Aminophylin Ampul', 'harga' => 6188, 'jenis' => 'Obat Umum', 'bentuk' => 'Injeksi'),
            array('nama' => 'Amiodarone 50 mg', 'harga' => 8700, 'jenis' => 'Obat Umum', 'bentuk' => 'Injeksi'),
            array('nama' => 'Asam Tranexamat 50 mg ', 'harga' => 1748, 'jenis' => 'Obat Umum', 'bentuk' => 'Injeksi'),
            array('nama' => 'Atracurium besylate 10 mg ', 'harga' => 10780, 'jenis' => 'Obat Umum', 'bentuk' => 'Injeksi'),
            array('nama' => 'Atropin sulfate 0', 'harga' => 10780, 'jenis' => 'Obat Umum', 'bentuk' => 'Injeksi'),
            array('nama' => 'Calcium Gluconas 100 mg inj', 'harga' => 9955, 'jenis' => 'Obat Umum', 'bentuk' => 'Injeksi'),
            array('nama' => 'Citicoline 1000 mg / 8 ml', 'harga' => 35200, 'jenis' => 'Obat Umum', 'bentuk' => 'Injeksi'),
            array('nama' => 'Citicoline 500 mg / 4 ml', 'harga' => 13750, 'jenis' => 'Obat Umum', 'bentuk' => 'Injeksi'),
            array('nama' => 'Cyanocobalamin 500 ml', 'harga' => 1035, 'jenis' => 'Obat Umum', 'bentuk' => 'Injeksi'),
            array('nama' => 'Dexamethason 5 mg', 'harga' => 1097, 'jenis' => 'Obat Umum', 'bentuk' => 'Injeksi'),
            array('nama' => 'Diphenhydramin 10 mg', 'harga' => 1095, 'jenis' => 'Obat Umum', 'bentuk' => 'Injeksi'),
            array('nama' => 'Dobutamine 50 mg', 'harga' => 11279, 'jenis' => 'Obat Umum', 'bentuk' => 'Injeksi'),
            array('nama' => 'Ephedrin HCl 50 mg ', 'harga' => 8569, 'jenis' => 'Obat Umum', 'bentuk' => 'Injeksi'),
            array('nama' => 'Epineprine 0', 'harga' => 8569, 'jenis' => 'Obat Umum', 'bentuk' => 'Injeksi'),
            array('nama' => 'Furosemide 10 mg  inj', 'harga' => 1333, 'jenis' => 'Obat Umum', 'bentuk' => 'Injeksi'),
            array('nama' => 'Ipratropium bromida0', 'harga' => 1333, 'jenis' => 'Obat Umum', 'bentuk' => 'Injeksi'),
            array('nama' => 'Ketorolac 30 mg ', 'harga' => 1045, 'jenis' => 'Obat Umum', 'bentuk' => 'Injeksi'),
            array('nama' => 'Lidocain Inj', 'harga' => 1144, 'jenis' => 'Obat Umum', 'bentuk' => 'Injeksi'),
            array('nama' => 'Mecobalamine 500 mcg inj', 'harga' => 6160, 'jenis' => 'Obat Umum', 'bentuk' => 'Injeksi'),
            array('nama' => 'Methylprednisolone serbuk inj 125 mg', 'harga' => 10800, 'jenis' => 'Obat Umum', 'bentuk' => 'Injeksi'),
            array('nama' => 'Nicardipine 10 mg / 10 ml inj', 'harga' => 23649, 'jenis' => 'Obat Umum', 'bentuk' => 'Injeksi'),
            array('nama' => 'Norepinephrine bitartrate 4 mg / 4 ml', 'harga' => 25839, 'jenis' => 'Obat Umum', 'bentuk' => 'Injeksi'),
            array('nama' => 'Omeprazole 40 mg / vial', 'harga' => 9898, 'jenis' => 'Obat Umum', 'bentuk' => 'Injeksi'),
            array('nama' => 'Ondansetron 4 mg/ 2 ml inj', 'harga' => 1070, 'jenis' => 'Obat Umum', 'bentuk' => 'Injeksi'),
            array('nama' => 'Pantoprazole sod Serbuk inj 40 mg', 'harga' => 30005, 'jenis' => 'Obat Umum', 'bentuk' => 'Injeksi'),
            array('nama' => 'Phytomenadione 10 mg/ Vit K1', 'harga' => 4528, 'jenis' => 'Obat Umum', 'bentuk' => 'Injeksi'),
            array('nama' => 'Ranitidine 25 mg ', 'harga' => 1188, 'jenis' => 'Obat Umum', 'bentuk' => 'Injeksi'),
            array('nama' => 'Tramadol HCl 100 mg / 2 ml', 'harga' => 105, 'jenis' => 'Obat Umum', 'bentuk' => 'Injeksi'),
            array('nama' => 'Acyclovir', 'harga' => 3150, 'jenis' => 'Obat Umum', 'bentuk' => 'Salep'),
            array('nama' => 'Betametason 0', 'harga' => 3150, 'jenis' => 'Obat Umum', 'bentuk' => 'Salep'),
            array('nama' => 'Desoximetasone 0', 'harga' => 3150, 'jenis' => 'Obat Umum', 'bentuk' => 'Salep'),
            array('nama' => 'Hydrocortison 2', 'harga' => 3150, 'jenis' => 'Obat Umum', 'bentuk' => 'Salep'),
            array('nama' => 'Ketoconazole 2 % krim', 'harga' => 2518, 'jenis' => 'Obat Umum', 'bentuk' => 'Salep'),
            array('nama' => 'Miconazol 2 % 10 gram', 'harga' => 3414, 'jenis' => 'Obat Umum', 'bentuk' => 'Salep'),
            array('nama' => 'Mometasone fluroate 0', 'harga' => 3150, 'jenis' => 'Obat Umum', 'bentuk' => 'Salep'),
            array('nama' => 'Sulfadiazine silver 1%', 'harga' => 20700, 'jenis' => 'Obat Umum', 'bentuk' => 'Salep'),
            array('nama' => 'Metamizole sodium 500 mg', 'harga' => 140, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet'),
            array('nama' => 'Dexamethason 0', 'harga' => 300, 'jenis' => 'Obat Umum', 'bentuk' => 'Tablet')
        ));
    }
}
