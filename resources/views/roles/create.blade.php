@extends('layouts.app')

@section('title', 'Tambah Role')

@section('content')
    <div class="container">
        <h1>Tambah Role</h1>
        <form action="{{ route('roles.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="role_name" class="form-label">Nama Role</label>
                <input type="text" class="form-control" id="role_name" name="role_name" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
