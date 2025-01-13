<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reformasi extends Model
{
    //

    public function kategoriRB()
    {
        return $this->belongsTo(KategoriRB::class, 'sub_rb', 'id');
    }
}
