<?php

namespace App\Http\Controllers;

use App\Talk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TalkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('talks.index', ['talks' => Talk::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Check of user admin is
        return view('talks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Check of user admin is
        $validatedAttr = $request->validate([
            'title' => 'required|max:191',
            'photo' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'speaker' => 'required|max:191',
            'start_time' => 'required',
            'end_time' => 'required',
            'max_places' => 'required'
        ]);

        $validatedAttr['available_places'] = $request->max_places;
        $talk = Talk::create($validatedAttr);

        return redirect($talk->path());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Talk  $talk
     * @return \Illuminate\Http\Response
     */
    public function show(Talk $talk)
    {
        return view('talks.detail', ['talk' => $talk]);
    }

    public function user_add(Talk $talk){
        Auth::user()->subscribed_talks()->attach($talk);
        return redirect(route('talks.index'));
    }

    public function user_remove(Talk $talk){
        Auth::user()->subscribed_talks()->detach($talk);
        return redirect(route('talks.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Talk  $talk
     * @return \Illuminate\Http\Response
     */
    public function edit(Talk $talk)
    {
        //Check of user admin is
        return view('talks.edit', ['talk' => $talk]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Talk  $talk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Talk $talk)
    {
        $talk->update($request->validate([
            'title' => 'required|max:191',
            'photo' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'speaker' => 'required|max:191',
            'start_time' => 'required',
            'end_time' => 'required',
            'max_places' => 'required'
        ]));

        return redirect($talk->path());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Talk  $talk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Talk $talk)
    {
        $talk->delete();
        return redirect(route('talks.index'));
    }
}
