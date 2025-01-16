<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dataset extends Model
{
    // In Dataset.php
    public function files()
    {
        return $this->hasMany(Filedata::class, 'dataset_id', 'id');
    }
}
