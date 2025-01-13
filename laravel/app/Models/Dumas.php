<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Dumas extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'subjek', 'pesan', 'lampiran',
    ];

    public function kategoriDumas()
    {
        return $this->belongsTo(KategoriDumas::class, 'subjek', 'id');
    }
}
