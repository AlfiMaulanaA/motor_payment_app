@extends('layouts.app')

@section('title', 'Edit Paket Kredit')

@section('content')
    <div class="container">
        <h1 class="my-4 text-center">Edit Paket Kredit</h1>
        <form action="{{ route('kredit-paket.update', $kreditPaket->paket_kode) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="paket_kode" class="form-label">Kode Paket</label>
                    <input type="text" class="form-control" id="paket_kode" name="paket_kode"
                        value="{{ $kreditPaket->paket_kode }}" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="paket_harga_cash" class="form-label">Harga Cash</label>
                    <input type="number" class="form-control" id="paket_harga_cash" name="paket_harga_cash"
                        value="{{ $kreditPaket->paket_harga_cash }}" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="paket_uang_muka" class="form-label">Uang Muka</label>
                    <input type="number" class="form-control" id="paket_uang_muka" name="paket_uang_muka"
                        value="{{ $kreditPaket->paket_uang_muka }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="paket_jumlah_cicilan" class="form-label">Jumlah Cicilan</label>
                    <input type="number" class="form-control" id="paket_jumlah_cicilan" name="paket_jumlah_cicilan"
                        value="{{ $kreditPaket->paket_jumlah_cicilan }}" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="paket_bunga" class="form-label">Bunga (%)</label>
                    <input type="number" class="form-control" id="paket_bunga" name="paket_bunga" step="0.01"
                        value="{{ $kreditPaket->paket_bunga }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="paket_nilai_cicilan" class="form-label">Nilai Cicilan</label>
                    <input type="number" class="form-control" id="paket_nilai_cicilan" name="paket_nilai_cicilan"
                        value="{{ $kreditPaket->paket_nilai_cicilan }}" required>
                </div>
            </div>
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
@endsection
