<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;  
use DB;
class SiswaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $siswa = [
            ['nis' => '12345', 'nama' => 'Nyan', 'kelas' => '11RPl3', 'alamat' => 'Jl. cisirung', 'tanggal_lahir' => '2005-05-15'],
            ['nis' => '12346', 'nama' => 'Kici', 'kelas' => '12RPL3', 'alamat' => 'Jl. cisirung', 'tanggal_lahir' => '2005-06-20'],
            ['nis' => '12347', 'nama' => 'Bedud', 'kelas' => '10RPL3', 'alamat' => 'Jl. cisirung', 'tanggal_lahir' => '2005-07-25'],
            ['nis' => '12348', 'nama' => 'Gebi', 'kelas' => '12RPL3', 'alamat' => 'Jl. cisirung', 'tanggal_lahir' => '2005-08-30'],
            ['nis' => '12349', 'nama' => 'Ulvan', 'kelas' => '11DKV2', 'alamat' => 'Jl. cisirung', 'tanggal_lahir' => '2005-09-10'],
        ];

        DB::table('siswa')->insert($siswa);
    }
}


