<?php

namespace App\Models;

use App\ViewModels\MovieViewModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ownedBy(User $user)
    {
        return $user->id === $this->user_id;
    }


//    public function movie()
//    {
//        return $this->hasMany(MovieViewModel::class);
//    }
}
