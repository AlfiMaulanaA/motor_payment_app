<?php

namespace App\Http\Controllers;

use App\Models\BeliKredit;
use App\Models\Pembeli;
use App\Models\Motor;
use App\Models\KreditPaket;
use Illuminate\Http\Request;

class BeliKreditController extends Controller
{
    public function index()
    {
        $beliKredit = BeliKredit::with(['pembeli', 'motor', 'paket'])->get();
        return view('beli_kredit.index', compact('beliKredit'));
    }

    public function create()
    {
        $pembelis = Pembeli::all();
        $motors = Motor::all();
        $kreditPaket = KreditPaket::all();
        return view('beli_kredit.create', compact('pembelis', 'motors', 'kreditPaket'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kridit_kode' => 'required|string|max:10|unique:beli_kredit',
            'pembeli_No_KTP' => 'required|exists:pembelis,pembeli_No_KTP',
            'motor_kode' => 'required|exists:motors,motor_kode',
            'paket_kode' => 'required|exists:kredit_paket,paket_kode',
            'kridit_tanggal' => 'required|date',
            'fotokopi_KTP' => 'required|boolean',
            'fotokopi_KK' => 'required|boolean',
            'fotokopi_slip_gaji' => 'required|boolean',
        ]);

        BeliKredit::create($validated);

        return redirect()->route('beli-kredit.index')->with('success', 'Transaksi kredit berhasil ditambahkan!');
    }

    public function show(BeliKredit $beliKredit)
    {
        return view('beli_kredit.show', compact('beliKredit'));
    }

    public function edit(BeliKredit $beliKredit)
    {
        $pembelis = Pembeli::all();
        $motors = Motor::all();
        $kreditPaket = KreditPaket::all();
        return view('beli_kredit.edit', compact('beliKredit', 'pembelis', 'motors', 'kreditPaket'));
    }

    public function update(Request $request, BeliKredit $beliKredit)
    {
        $validated = $request->validate([
            'pembeli_No_KTP' => 'required|exists:pembelis,pembeli_No_KTP',
            'motor_kode' => 'required|exists:motors,motor_kode',
            'paket_kode' => 'required|exists:kredit_paket,paket_kode',
            'kridit_tanggal' => 'required|date',
            'fotokopi_KTP' => 'required|boolean',
            'fotokopi_KK' => 'required|boolean',
            'fotokopi_slip_gaji' => 'required|boolean',
        ]);

        $beliKredit->update($validated);

        return redirect()->route('beli-kredit.index')->with('success', 'Transaksi kredit berhasil diperbarui!');
    }

    public function destroy(BeliKredit $beliKredit)
    {
        $beliKredit->delete();
        return redirect()->route('beli-kredit.index')->with('success', 'Transaksi kredit berhasil dihapus!');
    }
}
