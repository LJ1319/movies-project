@extends('layouts.main')

@section('content')
    <div class="container mx-auto px-4 pt-16">
        <div class="popular-tv">
            <h2 class="uppercase tracking-wider text-yellow-500 text-lg font-semibold">
                Popular Tv Shows
            </h2>
            <div class="grid gird-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($popularTv as $tvshow)
                    <x-tv-card :tvshow="$tvshow"></x-tv-card>
                @endforeach
            </div>
        </div>
    </div>
    {{--    end popular tv--}}

    <div class="container mx-auto px-4 py-24">
        <div class="top-rated-shows">
            <h2 class="uppercase tracking-wider text-yellow-500 text-lg font-semibold">
                Top Rated Shows
            </h2>
            <div class="grid gird-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-16">
                @foreach ($topRatedTv as $tvshow)
                    <x-tv-card :tvshow="$tvshow"></x-tv-card>
                @endforeach
            </div>
        </div>
@endsection
