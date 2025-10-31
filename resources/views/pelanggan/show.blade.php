@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">Detail Pelanggan</div>
                <div class="card-body">
                    <p><strong>Nama:</strong> {{ $pelanggan->nama }}</p>
                    <p><strong>No Telp:</strong> {{ $pelanggan->no_telp }}</p>
                    <p><strong>Alamat:</strong> {{ $pelanggan->alamat }}</p>

                    <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection