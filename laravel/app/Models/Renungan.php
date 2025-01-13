<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Renungan extends Model
{
    //
    public function userAuthor()
    {
        return $this->belongsTo(User::class, 'author', 'id_user');
    }
    public function userEditor()
    {
        return $this->belongsTo(User::class, 'editor', 'id_user');
    }
}
