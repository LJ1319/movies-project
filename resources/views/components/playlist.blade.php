@props(['playlist' => $playlist])

<div>
    <a href="{{ route('users.dashboard', $playlist->user) }}"
       class="font-bold">{{ $playlist->user->username }}</a>
    <span class="text-gray-300 text-sm">{{ $playlist->created_at->diffForHumans() }}</span>
    <div class="mb-2">
        <a href="{{ route('playlist.show', $playlist) }}">{{ $playlist->name }}</a>
    </div>


    {{--        @can('delete', $playlist)--}}
    @if($playlist->ownedBy(auth()->user()))
        <div class="flex items-center mb-4">
            @auth
                <form action="{{ route('playlists.destroy', $playlist) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="flex inline-flex items-center bg-red-500 text-gray-900 rounded font-semibold px-3 py-2 hover:bg-red-600 transition ease-in-out duration-150"
                    >
                        Delete
                    </button>


                </form>
            @endauth
        </div>

        <div class="flex items-center mb-4">
            @auth
                <form action="{{ route('playlists.edit', $playlist) }}" method="get">
                    @csrf
                    <button type="submit"
                            class="flex inline-flex items-center bg-yellow-500 text-gray-900 rounded font-semibold px-3 py-2 hover:bg-yellow-600 transition ease-in-out duration-150">
                        Edit
                    </button>
                </form>
            @endauth
        </div>
    @endif
    {{--        @endcan--}}
</div>

