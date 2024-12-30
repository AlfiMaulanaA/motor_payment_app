<?php

namespace App\Http\Controllers;

use App\Models\Pembeli;
use Illuminate\Http\Request;

class PembeliController extends Controller
{
    public function index()
    {
        $pembelis = Pembeli::all();
        return view('pembelis.index', compact('pembelis'));
    }

    public function create()
    {
        return view('pembelis.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'pembeli_No_KTP' => 'required|string|max:17|unique:pembelis',
            'pembeli_nama' => 'required|string|max:25',
            'pembeli_alamat' => 'required|string|max:60',
            'pembeli_telpon' => 'required|numeric',
            'pembeli_HP' => 'required|numeric',
        ]);

        Pembeli::create($validated);
        return redirect()->route('pembelis.index')->with('success', 'Pembeli berhasil ditambahkan!');
    }

    public function show(Pembeli $pembeli)
    {
        return view('pembelis.show', compact('pembeli'));
    }

    public function edit(Pembeli $pembeli)
    {
        return view('pembelis.edit', compact('pembeli'));
    }

    public function update(Request $request, Pembeli $pembeli)
    {
        $validated = $request->validate([
            'pembeli_nama' => 'required|string|max:25',
            'pembeli_alamat' => 'required|string|max:60',
            'pembeli_telpon' => 'required|numeric',
            'pembeli_HP' => 'required|numeric',
        ]);

        $pembeli->update($validated);
        return redirect()->route('pembelis.index')->with('success', 'Pembeli berhasil diperbarui!');
    }

    public function destroy(Pembeli $pembeli)
    {
        $pembeli->delete();
        return redirect()->route('pembelis.index')->with('success', 'Pembeli berhasil dihapus!');
    }

    public function exportToCsv()
    {
        $pembelis = Pembeli::all(['pembeli_No_KTP', 'pembeli_nama', 'pembeli_alamat', 'pembeli_telpon', 'pembeli_HP']);

        // Nama file CSV
        $fileName = "pembelis_export_" . date('YmdHis') . ".csv";

        // Header untuk file CSV
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');

        $output = fopen('php://output', 'w');

        // Tambahkan heading kolom
        fputcsv($output, ['No KTP', 'Nama', 'Alamat', 'Telepon', 'HP']);

        // Tambahkan data
        foreach ($pembelis as $pembeli) {
            fputcsv($output, $pembeli->toArray());
        }

        fclose($output);
        exit;
    }
}
