<div class="relative m-auto md:mt-0" x-data="{ isOpen: false }" @click.away="isOpen = false">
    <div
        wire:model.debounce.500ms="user"
        class="md:ml-4 mt-3 md:mt-0"
        x-ref="user"
        @keydown.window="
            if (event.keyCode === 191){
                event.prevent.default()
                $refs.user.focus
            }
        "
        @click="isOpen = true"
        @keydown="'isOpen = true"
        @keydown.escape.window="isOpen = false"
        @keydown.shift.tab="isOpen = false">
        <a href="#" class="rounded-full w-8 h-8 border-2 border-gray-700 px-3 py-3">
            {{--            <img src="/img/avatar.jpg" alt="avatar" class="rounded-full w-8 h-8">--}}
            {{ auth()->user()->username}}
        </a>
    </div>

    <div
        class="z-50 absolute bg-gray-800 text-sm rounded lg:w-48 md:w-32 sm:w-24 mt-4 "
        x-show.tansition.opacity="isOpen"
    >
        <ul>
            <li class="border-b border-gray-700">
                <a href="{{ route('dashboard') }}"
                   class="block hover:bg-gray-700 px-3 py-3 flex items-center"
                >
                    Dashboard
                </a>
            </li>
            <li class="border-b border-gray-700">
                <a href="{{ route('playlists') }}"
                   class="block hover:bg-gray-700 px-3 py-3 flex items-center"
                >
                    Playlists
                </a>
            </li>

            <li class="border-b border-gray-700">
                <form action="{{ route('logout') }}"
                      method="post"
                      class="inline hover:bg-gray-700 px-3 py-3 flex items-center">
                    @csrf
                    <button type="submit">
                        Logout
                    </button>
                </form>

            </li>
        </ul>
    </div>
</div>
