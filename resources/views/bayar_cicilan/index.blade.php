@extends('layouts.app')

@section('title', 'Daftar Pembayaran Cicilan')

@section('content')
    <div class="container">
        <h1>Daftar Pembayaran Cicilan</h1>

        <!-- Tombol Tambah Pembayaran Cicilan hanya untuk admin -->
        @can('manage-bayar-cicilan')
            <a href="{{ route('bayar-cicilan.create') }}" class="btn btn-primary mb-3">Tambah Pembayaran Cicilan</a>
            <a href="{{ route('bayar-cicilan.export.csv') }}" class="btn btn-success mb-3">Export Bayar Cicilan ke CSV</a>
        @endcan

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Kode Cicilan</th>
                    <th>Kode Kredit</th>
                    <th>Tanggal</th>
                    <th>Jumlah Bayar</th>
                    <th>Cicilan Ke</th>
                    <th>Sisa Cicilan</th>
                    <th>Sisa Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bayarCicilan as $cicilan)
                    <tr>
                        <td>{{ $cicilan->cicilan_kode }}</td>
                        <td>{{ $cicilan->beliKredit->kridit_kode }}</td>
                        <td>{{ $cicilan->cicilan_tanggal }}</td>
                        <td>{{ number_format($cicilan->cicilan_jumlah, 0, ',', '.') }}</td>
                        <td>{{ $cicilan->cicilan_ke }}</td>
                        <td>{{ $cicilan->cicilan_sisa_ke }}</td>
                        <td>{{ number_format($cicilan->cicilan_sisa_harga, 0, ',', '.') }}</td>
                        <td>
                            <!-- Tombol Edit dan Hapus hanya untuk admin -->
                            @can('manage-bayar-cicilan')
                                <a href="{{ route('bayar-cicilan.edit', $cicilan->cicilan_kode) }}"
                                    class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('bayar-cicilan.destroy', $cicilan->cicilan_kode) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            @else
                                <span class="text-muted">Akses Terbatas</span>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
