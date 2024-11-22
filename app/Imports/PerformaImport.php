<?php

namespace App\Imports;

use App\Models\Performa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PerformaImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Performa([
            'tahun' => $row['tahun'],
            'bulan' => $row['bulan'],
            'nipBps' => $row['nipBps'],
            'nama' => $row['nipBps'],
            'skp' => $row['skp'],
            'ckp' => $row['ckp'],
            'tl1' => $row['tl1'],
            'tl2' => $row['tl2'],
            'tl3' => $row['tl3'],
            'tl4' => $row['tl4'],
            'psw1' => $row['psw1'],
            'psw2' => $row['psw2'],
            'psw3' => $row['psw3'],
            'psw4' => $row['psw4'],
            'kjk' => $row['kjk'],
            'hk' => $row['hk'],
            'hadirApel' => $row['hadirApel'],
            'jumlahApel' => $row['jumlahApel'],
        ]);
    }
}
