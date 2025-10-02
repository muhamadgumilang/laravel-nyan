<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Mycontroller extends Controller
{
    public function hello()
    {
        $nama = "Nyan";
        $umur = 16;

        return view('hello', compact('nama', 'umur'));
    }

    public function siswa(){
        $data = [
            ['nama' => 'Ujang', 'kelas' => 'XI RPL 3'],
            ['nama' => 'Asep', 'kelas' => 'XI RPL 3'],
            ['nama' => 'Aep', 'kelas' => 'XI RPL 3'],
        ];
        return view('siswa', compact('data'));
    }
}
