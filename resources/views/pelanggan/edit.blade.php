@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">Edit Pelanggan</div>
                <div class="card-body">
                    <form action="{{ route('pelanggan.update', $pelanggan->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label>Nama Pelanggan</label>
                            <input type="text" name="nama" class="form-control" value="{{ $pelanggan->nama }}">
                        </div>
                        <div class="mb-3">
                            <label>No Telp</label>
                            <input type="text" name="no_telp" class="form-control" value="{{ $pelanggan->no_telp }}">
                        </div>
                        <div class="mb-3">
                            <label>Alamat</label>
                            <textarea name="alamat" class="form-control">{{ $pelanggan->alamat }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection