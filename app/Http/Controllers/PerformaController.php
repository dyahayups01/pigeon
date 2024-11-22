<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Performa;
use App\Models\Kepegawaian;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PerformaImport;

class PerformaController extends Controller
{
    // public function lihatData()
    // {
    //     return view('pages/performa/index', [
    //         'years' => range(2020, date('Y')),
    //         'months' => ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
    //     ]);
       
    //     //$search = $request->input('search');
    //    // $pegawais = Kepegawaian::query()
    //      //   ->when($search, function($query) use ($search) {
    //       //      $query->where('nama', 'like', "%{$search}%")
    //        //         ->orWhere('nipBps', 'like', "%{$search}%")
    //        //         ->orWhere('nipPns', 'like', "%{$search}%");
    //        // })
    //        // ->paginate(10);

    //     //return view('pages/kepegawaian/index', compact('pegawais', 'search')); 
    // }

    public function lihatData(Request $request)
    {
        $tahun = $request->input('tahun');
        $bulan = $request->input('bulan');

        $performas = Performa::latest();

        if($tahun)
            $performas->where("tahun", "=", $tahun);
    
        if($bulan)
            $performas->where("bulan", "=", $bulan);

        
        $performas = $performas->get();

        return view('pages/performa/index', [
            'years' => [2020,2021,2022,2023,2024, 2025],
            'months' => ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
            'performas' => $performas,
            'selectedYear' => $tahun,
            'selectedMonth' => $bulan
        ]);


    }

    public function tambahData()
    {
        $pegawais = Kepegawaian::all();
        return view('pages/performa/tambahData', [
            'years' => range(2023, date('Y')),
            'months' => ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
            'pegawais' => $pegawais
        ]);
    }

    public function storeData(Request $request)
    {
        $request->validate([
            'tahun' => 'required|integer',
            'bulan' => 'required|string',
            'pegawai_data' => 'required|string',
            'nama' => 'requied|string',
            'skp' => 'required|integer',
            'ckp' => 'required|integer',
            'tl1' => 'required|integer',
            'tl2' => 'required|integer',
            'tl3' => 'required|integer',
            'tl4' => 'required|integer',
            'psw1' => 'required|integer',
            'psw2' => 'required|integer',
            'psw3' => 'required|integer',
            'psw4' => 'required|integer',
            'kjk' => 'required|integer',
            'hk' => 'required|integer',
            'hadirApel' => 'required|integer',
            'jumlahApel' => 'required|integer',
            'excel' => 'nullable|file|mimes:xlsx,xls,csv',
            // Validate other fields
        ]);

        // Cek apakah file excel diupload
        if ($request->hasFile('excel')) {
            Excel::import(new PerformaImport, $request->file('excel'));
        } else {
            // Simpan data manual
            $pegawai = Kepegawaian::where('nipBps', '=', $request->pegawai_data)->first();
            
            Performa::create([ 
                'tahun' => $request->tahun,
                'bulan' => $request->bulan,
                'nipBps' => $request->pegawai_data,
                'nama' => $pegawai->nama,
                'skp' => $request->skp,
                'ckp' => $request->ckp,
                'tl1' => $request->tl1,
                'tl2' => $request->tl2,
                'tl3' => $request->tl3,
                'tl4' => $request->tl4,
                'psw1' => $request->psw1,
                'psw2' => $request->psw2,
                'psw3' => $request->psw3,
                'psw4' => $request->psw4,
                'kjk' => $request->kjk,
                'hk' => $request->hk,
                'hadirApel' => $request->hadirApel,
                'jumlahApel' => $request->jumlahApel,
            ]);
        }
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    public function importData(Request $request)
    {
        // Handle Excel import
    }

    public function downloadTemplate()
    {
        // Provide Excel template download
    }

    public function approvalData()
    {
        $performas = Performa::all();
        return view('performa.approval', ['performas' => $performas]);
    }

    public function approveData(Request $request)
    {
        $performa = Performa::find($request->input('id'));
        $performa->approved = true;
        $performa->save();

        return redirect()->route('performa.approval')->with('success', 'Data disetujui');
    }

    public function rejectData(Request $request)
    {
        $performa = Performa::find($request->input('id'));
        $performa->approved = false;
        $performa->save();

        return redirect()->route('performa.approval')->with('success', 'Data ditolak');
    }
}