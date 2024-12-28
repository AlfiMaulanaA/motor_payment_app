@extends('layouts.app')

@section('title', 'Edit Pembayaran Cicilan')

@section('content')
    <div class="container">
        <h1 class="my-4 text-center">Edit Pembayaran Cicilan</h1>
        <form action="{{ route('bayar-cicilan.update', $bayarCicilan->cicilan_kode) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="cicilan_kode" class="form-label">Kode Cicilan</label>
                    <input type="text" class="form-control" id="cicilan_kode" name="cicilan_kode"
                        value="{{ $bayarCicilan->cicilan_kode }}" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="kridit_kode" class="form-label">Kode Kredit</label>
                    <select class="form-control" id="kridit_kode" name="kridit_kode" required>
                        @foreach ($beliKredit as $kredit)
                            <option value="{{ $kredit->kridit_kode }}"
                                {{ $bayarCicilan->kridit_kode == $kredit->kridit_kode ? 'selected' : '' }}>
                                {{ $kredit->kridit_kode }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="cicilan_tanggal" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" id="cicilan_tanggal" name="cicilan_tanggal"
                        value="{{ $bayarCicilan->cicilan_tanggal }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="cicilan_jumlah" class="form-label">Jumlah Bayar</label>
                    <input type="number" class="form-control" id="cicilan_jumlah" name="cicilan_jumlah"
                        value="{{ $bayarCicilan->cicilan_jumlah }}" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="cicilan_ke" class="form-label">Cicilan Ke</label>
                    <input type="number" class="form-control" id="cicilan_ke" name="cicilan_ke"
                        value="{{ $bayarCicilan->cicilan_ke }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="cicilan_sisa_ke" class="form-label">Sisa Cicilan</label>
                    <input type="number" class="form-control" id="cicilan_sisa_ke" name="cicilan_sisa_ke"
                        value="{{ $bayarCicilan->cicilan_sisa_ke }}" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="cicilan_sisa_harga" class="form-label">Sisa Harga</label>
                    <input type="number" class="form-control" id="cicilan_sisa_harga" name="cicilan_sisa_harga"
                        value="{{ $bayarCicilan->cicilan_sisa_harga }}" required>
                </div>
            </div>
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
@endsection
