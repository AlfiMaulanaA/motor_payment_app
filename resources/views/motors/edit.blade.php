@extends('layouts.app')

@section('title', 'Edit Motor')

@section('content')
    <div class="container">
        <h1 class="my-4 text-center">Edit Motor</h1>
        <form action="{{ route('motors.update', $motor->motor_kode) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="motor_kode" class="form-label">Kode Motor</label>
                    <input type="text" class="form-control" id="motor_kode" name="motor_kode"
                        value="{{ $motor->motor_kode }}" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="motor_merk" class="form-label">Merk</label>
                    <input type="text" class="form-control" id="motor_merk" name="motor_merk"
                        value="{{ $motor->motor_merk }}" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="motor_type" class="form-label">Tipe</label>
                    <input type="text" class="form-control" id="motor_type" name="motor_type"
                        value="{{ $motor->motor_type }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="motor_warna_pilihan" class="form-label">Warna Pilihan</label>
                    <input type="text" class="form-control" id="motor_warna_pilihan" name="motor_warna_pilihan"
                        value="{{ $motor->motor_warna_pilihan }}" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="motor_harga" class="form-label">Harga</label>
                    <input type="number" class="form-control" id="motor_harga" name="motor_harga"
                        value="{{ $motor->motor_harga }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="motor_gambar" class="form-label">Gambar</label>
                    <input type="file" class="form-control" id="motor_gambar" name="motor_gambar" accept="image/*">
                    @if ($motor->motor_gambar)
                        <img src="data:image/jpeg;base64,{{ base64_encode($motor->motor_gambar) }}" alt="Motor Image"
                            class="img-thumbnail mt-2" width="150">
                    @endif
                </div>
            </div>
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
@endsection
