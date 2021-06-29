@props(['playlist' => $playlist])

<div>
    <a href="{{ route('users.dashboard', $playlist->user) }}"
       class="font-bold">{{ $playlist->user->username }}</a>
    <span class="text-gray-300 text-sm">{{ $playlist->created_at->diffForHumans() }}</span>
    <p class="mb-2">{{ $playlist->name }}</p>

        @can('delete', $playlist)
{{--    @if($playlist->ownedBy(auth()->user()))--}}
        <div class="flex items-center mb-4">
            @auth
                <form action="{{ route('playlists.destroy', $playlist) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500">Delete</button>
                </form>
            @endauth
        </div>
{{--    @endif--}}
        @endcan
</div>

