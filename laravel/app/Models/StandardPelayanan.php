<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StandardPelayanan extends Model
{
    //
    public function unit()
    {
        return $this->belongsTo(Uker::class, 'uker', 'id');
    }
}
