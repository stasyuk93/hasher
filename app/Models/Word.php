<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'word',
    ];

    public function hashes()
    {
        return $this->belongsToMany(Hash::class,'hash_words')
            ->withPivot('hash');
    }

    public function hashWord()
    {
        return $this->hasMany(HashWord::class);
    }
}
