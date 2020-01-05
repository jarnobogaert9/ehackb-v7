<?php

namespace App\Http\Controllers;

use App\Team;
use App\Teamrequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamrequestController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Team $team)
    {
        $teamrequest = Teamrequest::create(['team_id' => $team->id, 'user_id' => Auth::user()->id]);

        return redirect(route('teams.one', $team->id));
    }

    public function accept(Request $request, Teamrequest $teamrequest){
        $teamrequest->accepted = 1;
        $teamrequest->save();

        $teamrequest->team->members()->attach($teamrequest->sender);

        return redirect(route('teams.one', $teamrequest->team->id));
    }

    public function reject(Request $request, Teamrequest $teamrequest){
        $teamrequest->rejected = 1;
        $teamrequest->save();

        return redirect(route('teams.one', $teamrequest->team->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teamrequest  $teamrequest
     * @return \Illuminate\Http\Response
     */
    public function show(Teamrequest $teamrequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teamrequest  $teamrequest
     * @return \Illuminate\Http\Response
     */
    public function edit(Teamrequest $teamrequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teamrequest  $teamrequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teamrequest $teamrequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teamrequest  $teamrequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teamrequest $teamrequest)
    {
        if (Auth::user()->is_admin || Auth::user()->id === $teamrequest->team->creator->id || $teamrequest->rejected === 0){
            $teamrequest->delete();
        }
        return(redirect(route('teams.one', $teamrequest->team->id)));
    }
}
