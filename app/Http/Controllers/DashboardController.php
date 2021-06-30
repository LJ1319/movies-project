<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(User $user)
    {
        $playlists = $user->playlists()->with(['user'])->paginate(5);

        return view('users.dashboard', [
            'user' => $user,
            'playlists' => $playlists
        ]);

    }
}
