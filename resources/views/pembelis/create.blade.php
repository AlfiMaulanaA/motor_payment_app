@extends('layouts.app')

@section('title', 'Tambah Pembeli')

@section('content')
    <div class="container">
        <h1>Tambah Pembeli</h1>
        <form action="{{ route('pembelis.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="pembeli_No_KTP" class="form-label">No KTP</label>
                <input type="text" class="form-control" id="pembeli_No_KTP" name="pembeli_No_KTP" required>
            </div>
            <div class="mb-3">
                <label for="pembeli_nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="pembeli_nama" name="pembeli_nama" required>
            </div>
            <div class="mb-3">
                <label for="pembeli_alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="pembeli_alamat" name="pembeli_alamat" required>
            </div>
            <div class="mb-3">
                <label for="pembeli_telpon" class="form-label">No Telpon</label>
                <input type="text" class="form-control" id="pembeli_telpon" name="pembeli_telpon" required>
            </div>
            <div class="mb-3">
                <label for="pembeli_HP" class="form-label">No HP</label>
                <input type="text" class="form-control" id="pembeli_HP" name="pembeli_HP" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
