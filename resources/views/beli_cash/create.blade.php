@extends('layouts.app')

@section('title', 'Tambah Transaksi Cash')

@section('content')
    <div class="container">
        <h1 class="my-4 text-center">Tambah Transaksi Cash</h1>
        <form action="{{ route('beli-cash.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="cash_kode" class="form-label">Kode Transaksi</label>
                    <input type="text" class="form-control" id="cash_kode" name="cash_kode" required>
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
                    <label for="cash_tanggal" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" id="cash_tanggal" name="cash_tanggal" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="cash_bayar" class="form-label">Jumlah Bayar</label>
                    <input type="number" class="form-control" id="cash_bayar" name="cash_bayar" required>
                </div>
            </div>
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
@endsection
