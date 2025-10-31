@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">Data Pelanggan</div>
                <div class="card-body">
                    <a href="{{ route('pelanggan.create') }}" class="btn btn-success mb-3">+ Tambah Pelanggan</a>

                    @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>No Telp</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pelanggans as $p)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $p->nama }}</td>
                                <td>{{ $p->no_telp }}</td>
                                <td>{{ $p->alamat }}</td>
                                <td>
                                    <a href="{{ route('pelanggan.show', $p->id) }}" class="btn btn-primary btn-sm">Show</a> |
                                    <a href="{{ route('pelanggan.edit', $p->id) }}" class="btn btn-info btn-sm">Edit</a> |
                                    <form action="{{ route('pelanggan.destroy', $p->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Yakin hapus data ini?')" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection