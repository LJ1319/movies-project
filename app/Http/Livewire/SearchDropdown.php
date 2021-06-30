<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class SearchDropdown extends Component
{
    public string $search = '';

    public function render()
    {
        $searchMovieResults = [];
        $searchTvResults = [];

        if (strlen($this->search) >= 2) {
            $searchMovieResults = Http::withToken(config('services.tmdb.token'))
                ->get('https://api.themoviedb.org/3/search/movie?query=' . $this->search)
                ->json()['results'];
        }

        if (strlen($this->search) >= 2) {
            $searchTvResults = Http::withToken(config('services.tmdb.token'))
                ->get('https://api.themoviedb.org/3/search/tv?query=' . $this->search)
                ->json()['results'];
        }

        $searchResults = array_merge($searchMovieResults, $searchTvResults);


        return view('livewire.search-dropdown', [
            'searchResults' => collect($searchResults)->take(10),
            'searchMovieResults' => collect($searchMovieResults)->take(5),
            'searchTvResults' => collect($searchTvResults)->take(5),
        ]);
    }
}
