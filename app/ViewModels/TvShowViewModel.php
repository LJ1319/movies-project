<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class TvShowViewModel extends ViewModel
{
    public $tvshow;
    public $playlists;

    public function __construct($tvshow, $playlists)
    {
        $this->tvshow = $tvshow;
        $this->playlists = $playlists;
    }

    public function tvshow()
    {
        return collect($this->tvshow)->merge([
            'poster_path' => 'https://image.tmdb.org/t/p/w500/' . $this->tvshow['poster_path'],
            'vote_average' => $this->tvshow['vote_average'] * 10 . '%',
            'first_air_date' => Carbon::parse($tvshow['first_air_date'] ?? '')->format('M d, Y'),
            'genres' => collect($this->tvshow['genres'])->pluck('name')->flatten()->implode(', '),
            'crew' => collect($this->tvshow['credits']['crew'])->take(2),
            'cast' => collect($this->tvshow['credits']['cast'])->take(5),
            'images' => collect($this->tvshow['images']['backdrops'])->take(9),
        ])->only([
            'poster_path',
            'id',
            'genre_ids',
            'name',
            'vote_average',
            'overview',
            'first_air_date',
            'genres',
            'credits',
            'videos',
            'images',
            'crew',
            'cast',
            'created_by'
        ]);
    }
}
