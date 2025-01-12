<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    // Add 'name' to the fillable property
    protected $fillable = [
        'gender',
        'umur',
        'pekerjaan',
        'pendapat',
        'rekomendasi',
        'favorite_menu',
        'saran'
    ];
}
