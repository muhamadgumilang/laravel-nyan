<?php
namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Storage;
use Str;

class ProdukController extends Controller
{

    public function index()
    {
        $produk = Produk::latest()->paginate(5);
        return view('produk.index', compact('produk'));
    }

    public function create()
    {
        return view('produk.create');
    }

    public function store(Request $request)
    {
        //validate form
        $validated = $request->validate([
            'nama'      => 'required|min:5',
            'harga'     => 'required',
            'image'     => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'deskripsi' => 'required|min:10',
        ]);

        $produk            = new Produk();
        $produk->nama      = $request->nama;
        $produk->harga     = $request->harga;
        $produk->deskripsi = $request->deskripsi;
        // upload image
        if ($request->hasFile('image')) {
            $file       = $request->file('image');
            $randomName = Str::random(20) . '.' . $file->getClientOriginalExtension();
            $path       = $file->storeAs('produks', $randomName, 'public');
            // memasukan nama image nya ke database
            $produk->image = $path;
        }

        $produk->save();
        return redirect()->route('produk.index');
    }

    public function show($id)
    {
        $produk = Produk::findOrFail($id);
        return view('produk.show', compact('produk'));
    }

    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        return view('produk.edit', compact('produk'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama'      => 'required|min:5',
            'harga'     => 'required|min:5',
            'deskripsi' => 'required|min:10',
        ]);

        $produk            = Produk::findOrFail($id);
        $produk->nama      = $request->nama;
        $produk->harga     = $request->harga;
        $produk->deskripsi = $request->deskripsi;
        if ($request->hasFile('image')) {
            // hapus gambar lama jika ada
            if ($produk->image) {
                Storage::delete('public/produks/' . $produk->image);
            }

            // upload gambar baru
            $image = $request->file('image');
            $image->storeAs('public/produks', $image->hashName());
            $produk->image = $image->hashName();
        }

        $produk->image = $image->hashName();
        $produk->save();
        return redirect()->route('produk.index');

    }

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        Storage::delete('public/produks/' . $produk->image);
        $produk->delete();
        return redirect()->route('produk.index');

    }
}
