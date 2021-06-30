@extends('layouts.main')

@section('content')
    <div class="flex justify-center mx-auto px-4 pt-16">
        <div class="w-4/12 bg-gray-800 p-6 rounded-lg">
            <form action="{{ route('playlists.update', $playlist) }}" method="post" class="mb-4">
                @csrf
                @method('PUT')

                <h1 class="text-md">Update Playlist</h1>
                <div class="mb-4">
                    <label for="body" class="sr-only">Name</label>
                    <textarea name="name" id="name" cols="10" rows="2"
                              class="bg-gray-800 border-2 border-gray-700  w-full p-4 rounded-lg @error('name') border-red-500 @enderror"
                              placeholder="Playlist Name">{{ $playlist->name }}</textarea>

                    @error('name')
                    <div class="text-red-500 mt-2 text-md">
                        {{ $message }}
                    </div>
                    @enderror

                    <button type="submit"
                            class="flex inline-flex items-center bg-yellow-500 text-gray-900 rounded font-semibold px-3 py-2 hover:bg-yellow-600 transition ease-in-out duration-150"
                    >
                        Edit
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
