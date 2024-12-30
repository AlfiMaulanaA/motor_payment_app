<?php

namespace App\Http\Controllers;

use App\Models\BayarCicilan;
use App\Models\BeliKredit;
use Illuminate\Http\Request;

class BayarCicilanController extends Controller
{
    public function index()
    {
        // Mengambil data dengan relasi ke BeliKredit
        $bayarCicilan = BayarCicilan::with('beliKredit')->get();
        return view('bayar_cicilan.index', compact('bayarCicilan'));
    }

    public function create()
    {
        // Mengambil semua data BeliKredit
        $beliKredit = BeliKredit::all();
        return view('bayar_cicilan.create', compact('beliKredit'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'cicilan_kode' => 'required|string|max:10|unique:bayar_cicilan',
            'kridit_kode' => 'required|exists:beli_kredit,kridit_kode',
            'cicilan_tanggal' => 'required|date',
            'cicilan_jumlah' => 'required|numeric',
            'cicilan_ke' => 'required|integer',
            'cicilan_sisa_ke' => 'required|integer',
            'cicilan_sisa_harga' => 'required|numeric',
        ]);

        BayarCicilan::create($validated);

        return redirect()->route('bayar-cicilan.index')->with('success', 'Pembayaran cicilan berhasil ditambahkan!');
    }

    public function show(BayarCicilan $bayarCicilan)
    {
        // Menampilkan detail pembayaran cicilan
        return view('bayar_cicilan.show', compact('bayarCicilan'));
    }

    public function edit(BayarCicilan $bayarCicilan)
    {
        // Ambil semua data BeliKredit untuk dropdown
        $beliKredit = BeliKredit::all();
        return view('bayar_cicilan.edit', compact('bayarCicilan', 'beliKredit'));
    }

    public function update(Request $request, BayarCicilan $bayarCicilan)
    {
        $validated = $request->validate([
            'kridit_kode' => 'required|exists:beli_kredit,kridit_kode',
            'cicilan_tanggal' => 'required|date',
            'cicilan_jumlah' => 'required|numeric',
            'cicilan_ke' => 'required|integer',
            'cicilan_sisa_ke' => 'required|integer',
            'cicilan_sisa_harga' => 'required|numeric',
        ]);

        $bayarCicilan->update($validated);

        return redirect()->route('bayar-cicilan.index')->with('success', 'Pembayaran cicilan berhasil diperbarui!');
    }

    public function destroy(BayarCicilan $bayarCicilan)
    {
        $bayarCicilan->delete();
        return redirect()->route('bayar-cicilan.index')->with('success', 'Pembayaran cicilan berhasil dihapus!');
    }

    public function exportToCsv()
    {
        $bayarCicilan = BayarCicilan::with('beliKredit')->get();

        $fileName = "bayar_cicilan_" . date('YmdHis') . ".csv";
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');

        $output = fopen('php://output', 'w');
        fputcsv($output, ['Kode Cicilan', 'Kode Kredit', 'Tanggal Cicilan', 'Jumlah Bayar', 'Cicilan Ke', 'Sisa Cicilan', 'Sisa Harga']);

        foreach ($bayarCicilan as $cicilan) {
            fputcsv($output, [
                $cicilan->cicilan_kode,
                $cicilan->beliKredit->kridit_kode ?? 'N/A',
                $cicilan->cicilan_tanggal,
                $cicilan->cicilan_jumlah,
                $cicilan->cicilan_ke,
                $cicilan->cicilan_sisa_ke,
                $cicilan->cicilan_sisa_harga,
            ]);
        }

        fclose($output);
        exit;
    }
}
