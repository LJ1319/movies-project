@extends('layouts.main')

@section('content')
    <div class="container mx-auto px-4 pt-16">
        <div class="popular-movies">
            <h2 class="uppercase tracking-wider text-yellow-500 text-lg font-semibold">
                Popular Movies
            </h2>
            <div class="grid gird-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach($popularMovies as $movie)
                    <x-movie-card
                        :movie="$movie"
                        :genres="$genres">
                    </x-movie-card>
                @endforeach
            </div>
        </div>
    </div>
    {{--    end popular movies--}}

    <div class="container mx-auto px-4 py-24">
        <div class="now-playing-movies">
            <h2 class="uppercase tracking-wider text-yellow-500 text-lg font-semibold">
                Now Playing
            </h2>
            <div class="grid gird-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-16">
                @foreach($nowPlayingMovies as $movie)
                    <x-movie-card :movie="$movie"></x-movie-card>
                @endforeach
            </div>
        </div>
@endsection
