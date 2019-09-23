<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    public $timestamps = false;

    public function hashes()
    {
        return $this->hasMany(HashWord::class);
    }
}
