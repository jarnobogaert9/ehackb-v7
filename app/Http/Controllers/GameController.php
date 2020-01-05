<?php

namespace App\Http\Controllers;

use App\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GameController extends Controller
{
    function removeImage($fileName){
        $path = public_path('imgs'.DIRECTORY_SEPARATOR.'games'.DIRECTORY_SEPARATOR.$fileName);
        if (file_exists($path)) {
            File::delete($path);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('games.index',['games' => Game::all()]);
    }

    public function admin_index()
    {
        return view('admin.games',['games' => Game::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('games.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedAttr = $request->validate([
            'name' => 'required|max:191',
            'thumbnail' => 'required|mimes:jpg,jpeg,png|max:10000',
            'start_time' => 'required',
            'location' => 'required|max:191'
        ]);

        if ($request->file('thumbnail')->isValid()){
            $fileName = time().".".$request->thumbnail->extension();
            $request->thumbnail->move(public_path('imgs/games'), $fileName);

            $validatedAttr['thumbnail'] = $fileName;
        }

        $game = Game::create($validatedAttr);
        return redirect($game->path());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        return view('games.detail', [
            'game' => $game
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        return view('games.edit', ['game' => $game]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Game $game)
    {
        $validatedAttr = $request->validate([
            'name' => 'required|max:191',
            'start_time' => 'required',
            'location' => 'required|max:191'
        ]);

        if ($request->hasFile('thumbnail') && $request->file('thumbnail')->isValid()){
            $request->validate(['thumbnail' => 'mimes:jpg,jpeg,png|max:10000']);

            $this->removeImage($game->thumbnail);

            $fileName = time().".".$request->thumbnail->extension();
            $request->thumbnail->move(public_path('imgs/games'), $fileName);

            $validatedAttr['thumbnail'] = $fileName;
        }

        $game->update($validatedAttr);
        return redirect($game->path());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        $this->removeImage($game->thumbnail);
        $game->delete();
        return redirect(route('games.index'));
    }
}
