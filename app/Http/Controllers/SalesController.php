<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Motor;
use App\Models\BeliCash;
use App\Models\BeliKredit;

class SalesController extends Controller
{
    public function index()
    {
        // Query penjualan motor (cash dan kredit)
        $salesData = Motor::withCount([
            'beliCash as cash_sales_count',
            'beliKredit as kredit_sales_count',
        ])->get();

        // Data untuk Chart.js
        $labels = $salesData->pluck('motor_merk');
        $cashSales = $salesData->pluck('cash_sales_count');
        $kreditSales = $salesData->pluck('kredit_sales_count');

        // Total Pendapatan
        $totalPendapatanCash = BeliCash::sum('cash_bayar');
        $totalPendapatanKredit = BeliKredit::sum('kridit_uang_muka');

        // Kirim data ke view
        return view('sales', [
            'labels' => $labels,
            'cashSales' => $cashSales,
            'kreditSales' => $kreditSales,
            'totalPendapatanCash' => $totalPendapatanCash,
            'totalPendapatanKredit' => $totalPendapatanKredit,
        ]);
    }
}
