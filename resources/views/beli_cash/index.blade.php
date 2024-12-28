@extends('layouts.app')

@section('title', 'Daftar Transaksi Cash')

@section('content')
    <div class="container">
        <h1>Daftar Transaksi Cash</h1>
        <a href="{{ route('beli-cash.create') }}" class="btn btn-primary mb-3">Tambah Transaksi Cash</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Pembeli</th>
                    <th>Motor</th>
                    <th>Tanggal</th>
                    <th>Jumlah Bayar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($beliCash as $cash)
                    <tr>
                        <td>{{ $cash->cash_kode }}</td>
                        <td>{{ $cash->pembeli->pembeli_nama }}</td>
                        <td>{{ $cash->motor->motor_merk }}</td>
                        <td>{{ $cash->cash_tanggal }}</td>
                        <td>{{ number_format($cash->cash_bayar) }}</td>
                        <td>
                            <a href="{{ route('beli-cash.edit', $cash->cash_kode) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('beli-cash.destroy', $cash->cash_kode) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
