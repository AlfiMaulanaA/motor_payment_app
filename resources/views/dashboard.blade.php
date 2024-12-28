@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container">
        <h1 class="my-4 text-center">Dashboard</h1>

        <div class="row">
            <!-- Motors -->
            <div class="col-md-3">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Motors</h5>
                        <p class="card-text">Kelola data motor.</p>
                        <a href="{{ route('motors.index') }}" class="btn btn-light">Lihat</a>
                    </div>
                </div>
            </div>

            <!-- Pembelis -->
            <div class="col-md-3">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Pembelis</h5>
                        <p class="card-text">Kelola data pembeli.</p>
                        <a href="{{ route('pembelis.index') }}" class="btn btn-light">Lihat</a>
                    </div>
                </div>
            </div>

            <!-- Beli Cash -->
            <div class="col-md-3">
                <div class="card text-white bg-info mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Beli Cash</h5>
                        <p class="card-text">Kelola transaksi beli cash.</p>
                        <a href="{{ route('beli-cash.index') }}" class="btn btn-light">Lihat</a>
                    </div>
                </div>
            </div>

            <!-- Kredit Paket -->
            <div class="col-md-3">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Kredit Paket</h5>
                        <p class="card-text">Kelola data kredit paket.</p>
                        <a href="{{ route('kredit-paket.index') }}" class="btn btn-light">Lihat</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Beli Kredit -->
            <div class="col-md-3">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Beli Kredit</h5>
                        <p class="card-text">Kelola transaksi beli kredit.</p>
                        <a href="{{ route('beli-kredit.index') }}" class="btn btn-light">Lihat</a>
                    </div>
                </div>
            </div>

            <!-- Bayar Cicilan -->
            <div class="col-md-3">
                <div class="card text-white bg-secondary mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Bayar Cicilan</h5>
                        <p class="card-text">Kelola pembayaran cicilan.</p>
                        <a href="{{ route('bayar-cicilan.index') }}" class="btn btn-light">Lihat</a>
                    </div>
                </div>
            </div>

            <!-- Roles -->
            <div class="col-md-3">
                <div class="card text-white bg-dark mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Roles</h5>
                        <p class="card-text">Kelola data roles.</p>
                        <a href="{{ route('roles.index') }}" class="btn btn-light">Lihat</a>
                    </div>
                </div>
            </div>

            <!-- Users -->
            <div class="col-md-3">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Users</h5>
                        <p class="card-text">Kelola data pengguna.</p>
                        <a href="{{ route('users.index') }}" class="btn btn-light">Lihat</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
