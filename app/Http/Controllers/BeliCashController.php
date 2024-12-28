<?php

namespace App\Http\Controllers;

use App\Models\BeliCash;
use App\Models\Pembeli;
use App\Models\Motor;
use Illuminate\Http\Request;

class BeliCashController extends Controller
{
    public function index()
    {
        $beliCash = BeliCash::with(['pembeli', 'motor'])->get();
        return view('beli_cash.index', compact('beliCash'));
    }

    public function create()
    {
        $pembelis = Pembeli::all();
        $motors = Motor::all();
        return view('beli_cash.create', compact('pembelis', 'motors'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'cash_kode' => 'required|string|max:10|unique:beli_cash',
            'pembeli_No_KTP' => 'required|exists:pembelis,pembeli_No_KTP',
            'motor_kode' => 'required|exists:motors,motor_kode',
            'cash_tanggal' => 'required|date',
            'cash_bayar' => 'required|numeric',
        ]);

        BeliCash::create($validated);

        return redirect()->route('beli-cash.index')->with('success', 'Transaksi cash berhasil ditambahkan!');
    }

    public function show(BeliCash $beliCash)
    {
        return view('beli_cash.show', compact('beliCash'));
    }

    public function edit(BeliCash $beliCash)
    {
        $pembelis = Pembeli::all();
        $motors = Motor::all();
        return view('beli_cash.edit', compact('beliCash', 'pembelis', 'motors'));
    }

    public function update(Request $request, BeliCash $beliCash)
    {
        $validated = $request->validate([
            'pembeli_No_KTP' => 'required|exists:pembelis,pembeli_No_KTP',
            'motor_kode' => 'required|exists:motors,motor_kode',
            'cash_tanggal' => 'required|date',
            'cash_bayar' => 'required|numeric',
        ]);

        $beliCash->update($validated);

        return redirect()->route('beli-cash.index')->with('success', 'Transaksi cash berhasil diperbarui!');
    }

    public function destroy(BeliCash $beliCash)
    {
        $beliCash->delete();
        return redirect()->route('beli-cash.index')->with('success', 'Transaksi cash berhasil dihapus!');
    }
}
