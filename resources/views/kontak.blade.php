@extends('layouts.app')

@section('title', 'Kontak Help & Info')

@section('content')
    <div class="container my-5">
        <h1 class="text-center mb-4">Kontak Help & Info</h1>
        <div class="row">
            <div class="col-md-6">
                <h4>Bantuan</h4>
                <p>Jika Anda membutuhkan bantuan teknis, silakan hubungi kami melalui kontak di bawah ini:</p>
                <ul>
                    <li>Email: <a href="mailto:support@motorapp.com">support@motorapp.com</a></li>
                    <li>Telepon: +62 812-3456-7890</li>
                    <li>WhatsApp: +62 812-3456-7890</li>
                </ul>
            </div>
            <div class="col-md-6">
                <h4>Informasi</h4>
                <p>Untuk informasi lebih lanjut mengenai aplikasi atau layanan kami, kunjungi alamat berikut:</p>
                <ul>
                    <li>Alamat: Jl. Raya Motor No. 123, Jakarta</li>
                    <li>Website: <a href="https://motorapp.com" target="_blank">motorapp.com</a></li>
                </ul>
            </div>
        </div>
        <div class="text-center mt-5">
            <h5>Jam Operasional</h5>
            <p>Senin - Jumat: 08.00 - 17.00</p>
            <p>Sabtu: 08.00 - 12.00</p>
            <p>Minggu & Hari Libur: Tutup</p>
        </div>
    </div>
@endsection
