<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Performa extends Model
{
    use HasFactory;

    protected $guarded = ["id"];
    
    public function pegawai()
    {
        return $this->belongsTo(Kepegawaian::class);
    }
}
