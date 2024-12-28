@extends('layouts.app')

@section('title', 'Tambah Transaksi Kredit')

@section('content')
    <div class="container">
        <h1 class="my-4 text-center">Tambah Transaksi Kredit</h1>
        <form action="{{ route('beli-kredit.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="kridit_kode" class="form-label">Kode Kredit</label>
                    <input type="text" class="form-control" id="kridit_kode" name="kridit_kode" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="pembeli_No_KTP" class="form-label">Pembeli</label>
                    <select class="form-control" id="pembeli_No_KTP" name="pembeli_No_KTP" required>
                        @foreach ($pembelis as $pembeli)
                            <option value="{{ $pembeli->pembeli_No_KTP }}">{{ $pembeli->pembeli_nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="motor_kode" class="form-label">Motor</label>
                    <select class="form-control" id="motor_kode" name="motor_kode" required>
                        @foreach ($motors as $motor)
                            <option value="{{ $motor->motor_kode }}">{{ $motor->motor_merk }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="paket_kode" class="form-label">Paket Kredit</label>
                    <select class="form-control" id="paket_kode" name="paket_kode" required>
                        @foreach ($kreditPaket as $paket)
                            <option value="{{ $paket->paket_kode }}">{{ $paket->paket_kode }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="kridit_tanggal" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" id="kridit_tanggal" name="kridit_tanggal" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="fotokopi_KTP" class="form-label">Fotokopi KTP</label>
                    <select class="form-control" id="fotokopi_KTP" name="fotokopi_KTP" required>
                        <option value="1">Ya</option>
                        <option value="0">Tidak</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="fotokopi_KK" class="form-label">Fotokopi KK</label>
                    <select class="form-control" id="fotokopi_KK" name="fotokopi_KK" required>
                        <option value="1">Ya</option>
                        <option value="0">Tidak</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="fotokopi_slip_gaji" class="form-label">Fotokopi Slip Gaji</label>
                    <select class="form-control" id="fotokopi_slip_gaji" name="fotokopi_slip_gaji" required>
                        <option value="1">Ya</option>
                        <option value="0">Tidak</option>
                    </select>
                </div>
            </div>
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
@endsection
