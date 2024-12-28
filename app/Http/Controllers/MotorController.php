<?php

namespace App\Http\Controllers;

use App\Models\Motor;
use Illuminate\Http\Request;

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
            'motor_gambar' => 'nullable|file|mimes:jpg,png',
        ]);

        $motor = new Motor($validated);

        if ($request->hasFile('motor_gambar')) {
            $motor->motor_gambar = file_get_contents($request->file('motor_gambar'));
        }

        $motor->save();

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
            'motor_gambar' => 'nullable|file|mimes:jpg,png',
        ]);

        $motor->update($validated);

        if ($request->hasFile('motor_gambar')) {
            $motor->motor_gambar = file_get_contents($request->file('motor_gambar'));
            $motor->save();
        }

        return redirect()->route('motors.index')->with('success', 'Motor berhasil diperbarui!');
    }

    public function destroy(Motor $motor)
    {
        $motor->delete();
        return redirect()->route('motors.index')->with('success', 'Motor berhasil dihapus!');
    }
}
