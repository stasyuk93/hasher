<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HashWord extends Model
{
    public $timestamps = false;

    public function word()
    {
        return $this->belongsTo(Word::class);
    }
}
