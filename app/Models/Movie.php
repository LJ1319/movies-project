<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function ownedby(Playlist $playlist)
    {
        return $playlist->id === $this->playlist_id;
    }

    public function playlist()
    {
        return $this->belongsTo(Playlist::class);
    }
}
