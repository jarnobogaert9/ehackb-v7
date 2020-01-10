<?php

namespace App\Http\Controllers;

use App\Game;
use App\Team;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('teams.index', ['teams' => Team::all()]);
    }

    public function admin_index()
    {
        return view('admin.teams', ['teams' => Team::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teams.create', ['games' => Game::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:191',
            'game_id' => 'required|exists:games,id'
        ]);

        $team = new Team();
        $team->name = request('name');
        $team->user_id = Auth::user()->id;
        $team->game_id = request('game_id');
        $team->save();

        return redirect($team->path());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        return view('teams.detail', ['team' => $team]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        return view('teams.edit', ['team' => $team, 'games' => Game::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        $validatedAttr = $request->validate([
            'name' => 'required|max:191',
            'game_id' => 'required|exists:games,id'
        ]);

        $team->update($validatedAttr);
        return redirect($team->path());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        $team->delete();
        return (Auth::user()->is_admin && $team->creator->id !== Auth::user()->id) ? redirect(route('adminpanel.teams')) : redirect(route('users.ownProfile'));
    }

    public function remove_user(Team $team, User $user)
    {
        $team->members()->detach($user);
        $team->requests->where('user_id', $user->id)->first()->delete();
        ($team->members->count() + 1 < $team->seats->count() && $team->seats->last()->team()->dissociate()->save());
        if ($team->creator->id === Auth::user()->id || $user->id === Auth::user()->id) {
            return redirect(route('teams.edit', $team->id));
        }
        else if(Auth::user()->is_admin) {
            redirect(route('adminpanel.teams'));
        }
        return redirect(route('teams.edit', $team->id));
    }
}
