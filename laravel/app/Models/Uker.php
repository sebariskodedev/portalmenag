<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Uker extends Model
{
    use HasFactory;

    // Add 'name' to the fillable property
    protected $fillable = [
        'name',
        'deskripsi',  // assuming 'deskripsi' is another field
    ];

    public function standard_pelayanans()
    {
        return $this->hasOne(StandardPelayanan::class);
    }
}
