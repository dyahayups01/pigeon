<?php

namespace App\Http\Controllers;

use App\Models\Evaluasi;
use App\Models\Performa;
use Illuminate\Http\Request;

class EvaluasiController extends Controller
{
    public function evaluasiPerforma()
    {
        $years = range(2023, date('Y'));
        $months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        return view('pages/evaluasi/evaluasiPerforma', compact('years', 'months'));
    }

    public function hitungEvaluasi(Request $request)
    {
        $tahun = $request->input('tahun');
        $bulan = $request->input('bulan');

        $performas = Performa::where('tahun', $tahun)->where('bulan', $bulan)->get();

        foreach ($performas as $performa) {
            $absensiBulanan = 100 - (((2 * $performa->tl1) + (3 * $performa->tl2) + (4 * $performa->tl3) + (6 * $performa->tl4)) / (100 * $performa->hk));
            $persentaseApel = 100 * ($performa->hadirApel / $performa->jumlahApel);
            $evaluasiBulanan = (0.8 * $performa->skp) + (0.15 * $absensiBulanan) + (0.05 * $persentaseApel);

            Evaluasi::create(
                [
                    'nipBps' => $performa->nipBps,
                    'nama' => $performa->nama,
                    'skp' => $performa->skp,
                    'tl1' => $performa->tl1,
                    'tl2' => $performa->tl2,
                    'tl3' => $performa->tl3,
                    'tl4' => $performa->tl4,
                    'hk' => $performa->hk,
                    'hadirApel' => $performa->hadirApel,
                    'jumlahApel' => $performa->jumlahApel,
                    'absensiBulanan' => $absensiBulanan,
                    'persentaseApel' => $persentaseApel,
                    'evaluasiBulanan' => $evaluasiBulanan,
                    'tahun' => $tahun,
                    'bulan' => $bulan
                ]
            );

            
        }

        // Update rankings
        $evaluasis = Evaluasi::where('tahun', $tahun)->where('bulan', $bulan)->orderBy('evaluasiBulanan', 'desc')->get();
        foreach ($evaluasis as $index => $evaluasi) {
            $evaluasi->ranking = $index + 1;
            $evaluasi->save();
        }

        return redirect()->route('evaluasi.evaluasiPerforma')->with('status', 'Evaluasi performa berhasil dihitung.');
    }

    public function rekapitulasiPerforma()
    {
        $years = range(2023, date('Y'));
        $months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        return view('pages/evaluasi/rekapitulasiPerforma', compact('years', 'months'));
    }

    public function tampilkanRekapitulasi(Request $request)
    {
        $tahun = $request->input('tahun');
        $bulan = $request->input('bulan');

        $evaluasis = Evaluasi::where('tahun', $tahun)->where('bulan', $bulan)->get();

        return view('pages/evaluasi/tampilkanRekapitulasi', compact('evaluasis'));
    }
}