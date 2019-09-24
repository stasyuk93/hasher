<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HashWord extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'hash_id',
        'word_id',
        'hash',
    ];

    public function word()
    {
        return $this->belongsTo(Word::class);
    }

    public function hash()
    {
        return $this->belongsTo(Hash::class);
    }
}
