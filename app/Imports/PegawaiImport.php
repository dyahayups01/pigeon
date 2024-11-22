<?php

namespace App\Imports;

use App\Models\Kepegawaian;
use Maatwebsite\Excel\Concerns\Importable;
//use App\Models\Pegawai;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PegawaiImport implements ToModel
{
    //use Importable;

    public function model(array $row)
    {
        return new Kepegawaian([
            'nipBps' => $row[0],
            'nama' => $row[1],
            'nipPns' => $row[2],
            'pangkat' => $row[3],
            'golongan' => $row[4],
            'jabatan' => $row[5],
            'grade' => $row[6]
        ]);
    }
}
