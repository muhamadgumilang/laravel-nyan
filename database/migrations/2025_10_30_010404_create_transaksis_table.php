<?php
namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
   
    public function index()
    {
        $transaksi = Transaksi::with('transaksi')->get();
        return view('transaksi.index', compact('transaksi'));
    }

    
    public function create()
    {
        $transaksi = Transaksi::all();
        return view('transaksi.create', compact('transaksi'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'kode_unik'         => 'required',
            'tanggal_transaksi' => 'required',
            'pelanggan_id'      => 'required',
            'total_harga'       => 'required',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $transaksi = Transaksi::findOrFail($id);
        return view('transaksi.show', compact('transaksi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $transaksi = Transaksi::all();
        return view('transaksi.edit', compact('transaki', 'pelanggan', 'produk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode_unik'         => 'required',
            'tanggal_transaksi' => 'required',
            'pelanggan_id'      => 'required',
            'total_harga'       => 'required',
        ]);
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update($request->all());
        return redirect()->route('transaksi.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();
        return redirect()->route('transaksi.index');
            ;
    }
}
