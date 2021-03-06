<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class MovieViewModel extends ViewModel
{
    public $movie;
    public $playlists;

    public function __construct($movie, $playlists)
    {
        $this->movie = $movie;
        $this->playlists = $playlists;
    }

    public function movie()
    {
        return collect($this->movie)->merge([
            'poster_path' => 'https://image.tmdb.org/t/p/w500/' . $this->movie['poster_path'],
            'vote_average' => $this->movie['vote_average'] * 10 . '%',
            'release_date' => Carbon::parse($movie['release_date'] ?? '')->format('M d, Y'),
            'genres' => collect($this->movie['genres'])->pluck('name')->flatten()->implode(', '),
            'crew' => collect($this->movie['credits']['crew'])->take(2),
            'cast' => collect($this->movie['credits']['cast'])->take(5),
            'images' => collect($this->movie['images']['backdrops'])->take(9),
        ])->only([
            'poster_path',
            'id',
            'genre_ids',
            'title',
            'vote_average',
            'overview',
            'release_date',
            'genres',
            'credits',
            'videos',
            'images',
            'crew',
            'cast'
        ]);

    }
}
