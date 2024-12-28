@extends('layouts.app')

@section('title', 'Tambah Pembayaran Cicilan')

@section('content')
    <div class="container">
        <h1 class="my-4 text-center">Tambah Pembayaran Cicilan</h1>
        <form action="{{ route('bayar-cicilan.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="cicilan_kode" class="form-label">Kode Cicilan</label>
                    <input type="text" class="form-control" id="cicilan_kode" name="cicilan_kode" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="kridit_kode" class="form-label">Kode Kredit</label>
                    <select class="form-control" id="kridit_kode" name="kridit_kode" required>
                        @foreach ($beliKredit as $kredit)
                            <option value="{{ $kredit->kridit_kode }}">{{ $kredit->kridit_kode }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="cicilan_tanggal" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" id="cicilan_tanggal" name="cicilan_tanggal" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="cicilan_jumlah" class="form-label">Jumlah Bayar</label>
                    <input type="number" class="form-control" id="cicilan_jumlah" name="cicilan_jumlah" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="cicilan_ke" class="form-label">Cicilan Ke</label>
                    <input type="number" class="form-control" id="cicilan_ke" name="cicilan_ke" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="cicilan_sisa_ke" class="form-label">Sisa Cicilan</label>
                    <input type="number" class="form-control" id="cicilan_sisa_ke" name="cicilan_sisa_ke" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="cicilan_sisa_harga" class="form-label">Sisa Harga</label>
                    <input type="number" class="form-control" id="cicilan_sisa_harga" name="cicilan_sisa_harga" required>
                </div>
            </div>
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
@endsection
