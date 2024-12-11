<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dumas extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'subjek', 'pesan', 'lampiran',
    ];
}
