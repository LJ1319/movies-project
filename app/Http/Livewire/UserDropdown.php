<?php

namespace App\Http\Livewire;

use App\Models\Playlist;
use App\Models\User;
use Livewire\Component;

class UserDropdown extends Component
{
    public $playlist;

    public function render(User $user)
    {
        $playlists = Playlist::latest()->paginate(5);

        foreach ($playlists as $playlist) {
            $this->playlist = $playlist;
        }

        return view('livewire.user-dropdown', [
            'user' => $user,
            'playlist' => $playlist
        ]);
    }
}
