@extends('layouts.app')

@section('title', 'Daftar Paket Kredit')

@section('content')
    <div class="container">
        <h1>Daftar Paket Kredit</h1>
        <a href="{{ route('kredit-paket.create') }}" class="btn btn-primary mb-3">Tambah Paket Kredit</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Kode Paket</th>
                    <th>Harga Cash</th>
                    <th>Uang Muka</th>
                    <th>Jumlah Cicilan</th>
                    <th>Bunga</th>
                    <th>Nilai Cicilan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kreditPaket as $paket)
                    <tr>
                        <td>{{ $paket->paket_kode }}</td>
                        <td>{{ number_format($paket->paket_harga_cash) }}</td>
                        <td>{{ number_format($paket->paket_uang_muka) }}</td>
                        <td>{{ $paket->paket_jumlah_cicilan }}</td>
                        <td>{{ $paket->paket_bunga }}%</td>
                        <td>{{ number_format($paket->paket_nilai_cicilan) }}</td>
                        <td>
                            <a href="{{ route('kredit-paket.edit', $paket->paket_kode) }}"
                                class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('kredit-paket.destroy', $paket->paket_kode) }}" method="POST"
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
