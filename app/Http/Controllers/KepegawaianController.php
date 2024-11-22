<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PegawaiImport;
use App\Models\Kepegawaian;

class KepegawaianController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $pegawais = Kepegawaian::query()
            ->when($search, function($query) use ($search) {
                $query->where('nama', 'like', "%{$search}%")
                    ->orWhere('nipBps', 'like', "%{$search}%")
                    ->orWhere('nipPns', 'like', "%{$search}%");
            })
            ->paginate(10);

        return view('pages/kepegawaian/index', compact('pegawais', 'search'));
    }

    public function create()
    {
        return view('pages/kepegawaian/tambahPegawai');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nipBps' => 'nullable|string|max:255',
            'nama' => 'nullable|string|max:255',
            'nipPns' => 'nullable|string|max:255',
            'pangkat' => 'nullable|string|max:255',
            'golongan' => 'nullable|string|max:255',
            'jabatan' => 'nullable|string|max:255',
            'grade' => 'nullable|string|max:255',
            'excel' => 'nullable|file|mimes:xlsx,xls,csv',
        ]);

        // Cek apakah file excel diupload
        if ($request->hasFile('excel')) {
            Excel::import(new PegawaiImport, $request->file('excel'));
        } else {
            // Simpan data manual
            Kepegawaian::create([ 
                'nipBps' => $request->nipBps,
                'nama' => $request->nama,
                'nipPns' => $request->nipPns,
                'pangkat' => $request->pangkat,
                'golongan' => $request->golongan,
                'jabatan' => $request->jabatan,
                'grade' => $request->grade,
            ]);
        }
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
        
    }

    public function edit($id)
    {
        $pegawai = Kepegawaian::findOrFail($id);
        return view('pegawai.edit', compact('kepegawaian'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nipBps' => 'required|unique:kepegawaians,nipBps,' . $id,
            'nama' => 'required',
            'nipPns' => 'required|unique:kepegawaians,nipPns,' . $id,
            'pangkat' => 'required',
            'golongan' => 'required',
            'jabatan' => 'required',
            'grade' => 'required',
        ]);

        $pegawai = Kepegawaian::findOrFail($id);
        $pegawai->update($request->all());

        return redirect()->route('pegawai.index')->with('success', 'Data pegawai berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pegawai = Kepegawaian::findOrFail($id);
        $pegawai->delete();

        return redirect()->route('pages/kepegawaian/index')->with('success', 'Pegawai berhasil dihapus.');
    }

    public function approvalPegawai ()
    {
        return view('pages/kepegawaian/approvalPegawai');
    }
}

    
