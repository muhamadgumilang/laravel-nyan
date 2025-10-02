<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    //Secara otomatis model ini menganggap
    // table yang digunakan adalah table 'post'

    // table yang digunakan untuk model 
    // protected $table = 'post';

    //apa saja yang boleh di isi
    public $fillable = ['title', 'content'];

    // aja saja yang boleh di perlihatan
    public $visible = ['id', 'title', 'content'];

    // mengisi tanggal kapan dibuat dan kapan di update secara otomatis
    public $timestamps = true;
}
