<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uker extends Model
{
    use HasFactory;

    // Add 'name' to the fillable property
    protected $fillable = [
        'name',
        'deskripsi',  // assuming 'deskripsi' is another field
    ];
}
