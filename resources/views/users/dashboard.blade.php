@extends('layouts.main')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12">
            <div class="p-6">
                <h1 class="text-2xl font-medium mb-1"> {{ $user->username }}</h1>
                <p>Number of playlists: {{ $playlists->count() }}</p>
            </div>

            <div class="bg-gray-800 p-6 border-2 border-gray-500 rounded-lg w-2/3">
                @if($playlists->count())
                    @foreach($playlists as $playlist)
                        <x-playlist :playlist="$playlist"/>
                    @endforeach
                    {{ $playlists->links() }}
                @else
                    <p>No playlists yet</p>
                @endif
            </div>
        </div>
    </div>
@endsection
