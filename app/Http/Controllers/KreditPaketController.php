<?php

namespace App\Http\Controllers;

use App\Models\KreditPaket;
use Illuminate\Http\Request;

class KreditPaketController extends Controller
{
    public function index()
    {
        $kreditPaket = KreditPaket::all();
        return view('kredit_paket.index', compact('kreditPaket'));
    }

    public function create()
    {
        return view('kredit_paket.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'paket_kode' => 'required|string|max:10|unique:kredit_paket',
            'paket_harga_cash' => 'required|numeric',
            'paket_uang_muka' => 'required|numeric',
            'paket_jumlah_cicilan' => 'required|integer',
            'paket_bunga' => 'required|numeric',
            'paket_nilai_cicilan' => 'required|numeric',
        ]);

        KreditPaket::create($validated);

        return redirect()->route('kredit-paket.index')->with('success', 'Paket kredit berhasil ditambahkan!');
    }

    public function show(KreditPaket $kreditPaket)
    {
        return view('kredit_paket.show', compact('kreditPaket'));
    }

    public function edit(KreditPaket $kreditPaket)
    {
        return view('kredit_paket.edit', compact('kreditPaket'));
    }

    public function update(Request $request, KreditPaket $kreditPaket)
    {
        $validated = $request->validate([
            'paket_harga_cash' => 'required|numeric',
            'paket_uang_muka' => 'required|numeric',
            'paket_jumlah_cicilan' => 'required|integer',
            'paket_bunga' => 'required|numeric',
            'paket_nilai_cicilan' => 'required|numeric',
        ]);

        $kreditPaket->update($validated);

        return redirect()->route('kredit-paket.index')->with('success', 'Paket kredit berhasil diperbarui!');
    }

    public function destroy(KreditPaket $kreditPaket)
    {
        $kreditPaket->delete();
        return redirect()->route('kredit-paket.index')->with('success', 'Paket kredit berhasil dihapus!');
    }
}
