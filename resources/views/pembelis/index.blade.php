@extends('layouts.app')

@section('title', 'Daftar Pembeli')

@section('content')
    <div class="container">
        <h1 class="mb-4">Daftar Pembeli</h1>

        <!-- Tombol Tambah Pembeli -->
        <a href="{{ route('pembelis.create') }}" class="btn btn-primary mb-3">Tambah Pembeli</a>
        <a href="{{ route('pembelis.export.csv') }}" class="btn btn-success mb-3">Export ke CSV</a>

        <!-- Tabel Data Pembeli -->
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>No KTP</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Telpon</th>
                        <th>HP</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pembelis as $pembeli)
                        <tr>
                            <td>{{ $pembeli->pembeli_No_KTP }}</td>
                            <td>{{ $pembeli->pembeli_nama }}</td>
                            <td>{{ $pembeli->pembeli_alamat }}</td>
                            <td>{{ $pembeli->pembeli_telpon }}</td>
                            <td>{{ $pembeli->pembeli_HP }}</td>
                            <td>
                                <!-- Tombol Edit -->
                                <a href="{{ route('pembelis.edit', $pembeli->pembeli_No_KTP) }}"
                                    class="btn btn-warning btn-sm">Edit</a>

                                <!-- Tombol Lihat -->
                                <a href="{{ route('pembelis.show', $pembeli->pembeli_No_KTP) }}"
                                    class="btn btn-info btn-sm">Lihat</a>

                                <!-- Tombol Hapus -->
                                <form action="{{ route('pembelis.destroy', $pembeli->pembeli_No_KTP) }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus pembeli ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada data pembeli.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
