<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PlaylistController extends Controller
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
    public function index()
    {
        $playlists = Playlist::latest()->with(['user', 'movies'])->paginate(5);

        return view('playlists.index', [
            'playlists' => $playlists
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return RedirectResponse
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        auth()->user()->playlists()->create($request->only('name', ));

        return back()->with('message', 'Your playlist has been created');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function show(Playlist $playlist)
    {
        return view('playlists.show', [
            'playlist' => $playlist
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Playlist $playlist
     * @param User $user
     * @return Application|Factory|View
     */
    public function edit(Playlist $playlist, User $user)
    {
        if ($playlist->ownedBy(auth()->user())) {
            return view('playlists.edit')->with('playlist', $playlist);
        } else abort(403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Playlist $playlist
     * @return JsonResponse
     */
    public function update(Request $request, Playlist $playlist)
    {
        if ($request->user()->id !== $playlist->user_id) {
            return response()->json(['error' => 'You can only edit your own books.'], 403);
        }

        $request->validate([
            'name' => 'required|max:255',
        ]);

        $playlist->update($request->only(['name']));

        return redirect(route('playlists'))->with('message', 'Your playlist has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Playlist $playlist
     * @return RedirectResponse
     */
    public function destroy(Playlist $playlist)
    {
        $this->authorize('delete', $playlist);

        $playlist->delete();

        return back()->with('message', 'Your playlist has been deleted');
    }
}
