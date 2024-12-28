@extends('layouts.app')

@section('title', 'Daftar Motor')

@section('content')
    <div class="container">
        <h1 class="my-4 text-center">Daftar Motor</h1>
        <a href="{{ route('motors.create') }}" class="btn btn-primary mb-3">Tambah Motor</a>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Merk</th>
                    <th>Tipe</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($motors as $motor)
                    <tr>
                        <td>{{ $motor->motor_kode }}</td>
                        <td>{{ $motor->motor_merk }}</td>
                        <td>{{ $motor->motor_type }}</td>
                        <td>{{ number_format($motor->motor_harga, 0, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('motors.edit', $motor->motor_kode) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('motors.destroy', $motor->motor_kode) }}" method="POST"
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
