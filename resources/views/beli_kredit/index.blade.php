@extends('layouts.app')

@section('title', 'Daftar Transaksi Kredit')

@section('content')
    <div class="container">
        <h1>Daftar Transaksi Kredit</h1>
        <a href="{{ route('beli-kredit.create') }}" class="btn btn-primary mb-3">Tambah Transaksi Kredit</a>
        <a href="{{ route('beli-kredit.export.csv') }}" class="btn btn-success mb-3">Export ke CSV</a>

        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>Kode Kredit</th>
                    <th>Pembeli</th>
                    <th>Motor</th>
                    <th>Paket Kredit</th>
                    <th>Tanggal Kredit</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($beliKredit as $kredit)
                    <tr>
                        <td>{{ $kredit->kridit_kode }}</td>
                        <td>{{ $kredit->pembeli->pembeli_nama }}</td>
                        <td>{{ $kredit->motor->motor_merk }} - {{ $kredit->motor->motor_type }}</td>
                        <td>{{ $kredit->paket->paket_kode }} ({{ $kredit->paket->paket_jumlah_cicilan }}x)</td>
                        <td>{{ $kredit->kridit_tanggal }}</td>
                        <td>
                            <a href="{{ route('beli-kredit.show', $kredit->kridit_kode) }}"
                                class="btn btn-info btn-sm">Lihat</a>
                            <a href="{{ route('beli-kredit.edit', $kredit->kridit_kode) }}"
                                class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('beli-kredit.destroy', $kredit->kridit_kode) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada data transaksi kredit.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
