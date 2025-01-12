<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KlikBantuan extends Model
{
    use HasFactory;

    // Add 'name' to the fillable property
    protected $fillable = [
        'ip',
    ];
}
