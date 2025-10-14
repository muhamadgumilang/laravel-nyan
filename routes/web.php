<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\Mycontroller;
use App\Http\Controllers\Postcontroller;

Route::get('/', function () {
    return view('welcome');
});


// basic
Route::get('about', function(){
    return'<h1> hallo </h1>'.
            '<br> Selamat datang di perpustakaan di gital';
});


Route::get('nyanz', function(){
    return'<h1> Assalammualaikum </h1>'.
            '<br> Hallo,, Perkenalkan nama saya Muhamad Gumilang biasa di panggil nyan'.
            '<br> Umur saya adalah 16 tahun alamat saya di KP. Bojong Suren RT03/11';
});


Route::get('buku', function(){
    return view('buku');
});



Route::get('menu', function(){
    $data = [
        ['nama_makanan'=>'bala-bala', 'harga'=>1000, 'jumlah'=>10],
        ['nama_makanan'=>'gehu pedas', 'harga'=>2000, 'jumlah'=>15],
        ['nama_makanan'=>'cireng isi ayam', 'harga'=>2500, 'jumlah'=>5],
    ];
$resto = "Resto MPL - Makanan Penuh Lemak";
return view('menu', compact('data', 'resto'));
});


// route parameter (nilai)
Route::get('books/{judul}', function($a){
    return 'Judul Buku :' .$a;
});

// Route::get('post/{title}/{category}', function($a, $b){
//     //compact assosiatif
//     return view('post',['judul'=>$a, 'cat'=>$b]);
// });


//route optional parameter
// di tandai dengan ?
Route::get('profile/{nama?}', function($a = "guest"){
    return 'Hallo nama saya '.$a;
});


Route::get('order/{item?}', function($a = "Nasi"){
    return view('order',compact('a'));
});



//latihan ke 1
Route::get('barang', function () {
    $data = [
        ['nama_benda'=>'buku','harga'=>15000, 'jumlah'=>2],
        ['nama_benda'=>'pensil','harga'=>3000, 'jumlah'=>5],
        ['nama_benda'=>'penggaris','harga'=>7000, 'jumlah'=>1],
    ];
    $resto = "Jualan perlengkapan sekolah";
    return view('barang', compact('data','resto'));
});


// latihan ke 2
Route::get('/nilai/{nama}/{mapel}/{nilai}', function ($nama, $mapel, $nilai) {
    return view('nilai_kelulusan', compact('nama', 'mapel', 'nilai'));
});


// latihan ke 3
Route::get('/grading/{nama?}/{nilai?}', function ($nama = 'Guest', $nilai = 0) {
    return view('grading', compact('nama', 'nilai'));
});



// latihan ke 4
Route::get('/nilai-ratarata', function () {
    $siswa = [
        ['nama' => 'ehan', 'nilai' => 85],
        ['nama' => 'jahrun', 'nilai' => 75],
        ['nama' => 'jumbo', 'nilai' => 95],
    ];

    return view('nilai-ratarata', compact('siswa'));
});





// test model
Route::get('test-model', function(){
    $data = App\Models\Post::all();
    return $data;
});


//tambah data
Route::get('create-data-post', function(){
    $data = App\Models\Post::create([
        'title' => 'well well well',
        'content' => 'Lorem Ipsum'
    ]);
    return $data;
});

Route::get('show-data/{id}', function ($id){
    $data = App\Models\Post::find($id);
    return $data;
});

Route::get('edit-data/{id}', function ($id){
    // mengupdate data berdasarkan parameter id
    $data    = App\Models\Post::find($id);
    $data->title = "Membangun Projoct dengan Laravel";
    $data->save();
    return $data;
});


Route::get('delete-data/{id}', function ($id){
    // menghapus data berdasarkan parameter id
    $data= App\Models\Post::find($id);
    $data->delete();
    // di kembalikan ke halaman test-model
    return redirect('test-model');
});


Route::get('search/{cari}', function($query){
    // mencari data berdasarkan title yang mirip seperti (like) ......
    $data = App\Models\Post::where('title', 'like', '%' . $query . '%')->get();
    return $data;
});


//pemanggilan url menggunakan controller
Route::get('greeting', [Mycontroller::class, 'hello']);
Route::get('student',  [Mycontroller::class, 'siswa']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//post
Route::get('post', [Postcontroller::class, 'index'])->name('post.index');
Route::get('post/create', [Postcontroller::class, 'create'])->name('post.create');
Route::post('post', [Postcontroller::class, 'store'])->name('post.store');
Route::get('post/{id}/edit', [Postcontroller::class, 'edit'])->name('post.edit');
Route::put('post/{id}', [Postcontroller::class, 'update'])->name('post.update');
Route::delete('post/{id}', [Postcontroller::class, 'destroy'])->name('post.delete');
Route::get('post/{id}', [Postcontroller::class, 'show'])->name('post.show');



Route::resource('produk', App\Http\Controllers\ProdukController::class)->middleware('auth');



// tugas biodata
Route::resource('biodata', App\Http\Controllers\BiodataController::class)->middleware('auth');



use App\Http\Controllers\RelasiController;

Route::get('/one-to-one', [RelasiController::class, 'oneToONe']);
Route::get('/one-to-many', [RelasiController::class, 'oneToMany']);
Route::get('/many-to-many', [RelasiController::class, 'manyToMany']);


Route::get('eloquent', [RelasiController::class, 'eloquent']);

