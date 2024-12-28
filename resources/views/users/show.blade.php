@extends('layouts.app')

@section('title', 'Detail User')

@section('content')
    <div class="container">
        <h1>Detail User</h1>
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <td>{{ $user->id }}</td>
            </tr>
            <tr>
                <th>Nama</th>
                <td>{{ $user->name }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $user->email }}</td>
            </tr>
            <tr>
                <th>Dibuat Pada</th>
                <td>{{ $user->created_at->format('d-m-Y H:i:s') }}</td>
            </tr>
        </table>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
@endsection
