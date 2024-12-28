<?php

namespace App\Http\Controllers;

use App\Models\Motor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MotorController extends Controller
{
    public function index()
    {
        $motors = Motor::all();
        return view('motors.index', compact('motors'));
    }

    public function create()
    {
        return view('motors.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'motor_kode' => 'required|string|max:10|unique:motors',
            'motor_merk' => 'required|string|max:15',
            'motor_type' => 'required|string|max:15',
            'motor_warna_pilihan' => 'required|string|max:70',
            'motor_harga' => 'required|numeric',
            'motor_gambar' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Simpan gambar ke storage jika ada
        if ($request->hasFile('motor_gambar')) {
            $validated['motor_gambar'] = $request->file('motor_gambar')->store('motor_images', 'public');
        }

        Motor::create($validated);

        return redirect()->route('motors.index')->with('success', 'Motor berhasil ditambahkan!');
    }

    public function show(Motor $motor)
    {
        return view('motors.show', compact('motor'));
    }

    public function edit(Motor $motor)
    {
        return view('motors.edit', compact('motor'));
    }

    public function update(Request $request, Motor $motor)
    {
        $validated = $request->validate([
            'motor_merk' => 'required|string|max:15',
            'motor_type' => 'required|string|max:15',
            'motor_warna_pilihan' => 'required|string|max:70',
            'motor_harga' => 'required|numeric',
            'motor_gambar' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Hapus gambar lama jika ada gambar baru
        if ($request->hasFile('motor_gambar')) {
            if ($motor->motor_gambar) {
                Storage::disk('public')->delete($motor->motor_gambar);
            }
            $validated['motor_gambar'] = $request->file('motor_gambar')->store('motor_images', 'public');
        }

        $motor->update($validated);

        return redirect()->route('motors.index')->with('success', 'Motor berhasil diperbarui!');
    }

    public function destroy(Motor $motor)
    {
        // Hapus gambar dari storage jika ada
        if ($motor->motor_gambar) {
            Storage::disk('public')->delete($motor->motor_gambar);
        }

        $motor->delete();

        return redirect()->route('motors.index')->with('success', 'Motor berhasil dihapus!');
    }
}
