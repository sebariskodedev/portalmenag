<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Sebaran extends Model
{
    use HasFactory;

    // Add 'name' to the fillable property
    protected $fillable = [
        'provinsi',
        'umat',
        'rumah_ibadah',
        'lembaga',
        'tokoh',
        'penyuluh',
        'pasraman',
        'siswa',
        'guru',
        'perguruan_tinggi',
        'dosen',
        'mahasiswa',
        'tenaga_administrasi'
    ];
}
