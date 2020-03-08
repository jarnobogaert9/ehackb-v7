<?php

namespace App\Http\Controllers;

use App\Talk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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

    public function admin_index()
    {
        return view('admin.talks', ['talks' => Talk::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $validatedAttr = $request->validate([
            'title' => 'required|max:191',
            'photo' => 'required|mimes:jpg,jpeg,png|max:10000',
            'excerpt' => 'required',
            'body' => 'required',
            'speaker' => 'required|max:191',
            'start_time' => 'required',
            'end_time' => 'required',
            'max_places' => 'required'
        ]);

        if ($request->file('photo')->isValid()){
            $validatedAttr['photo'] = request('photo')->store('uploads', 'public');
        }

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
        if ($talk->available_places > 0) {
            Auth::user()->subscribed_talks()->attach($talk);
            $talk->available_places--;
            $talk->save();
        }
        return redirect(route('talks.one', $talk->id));
    }

    public function user_remove(Talk $talk){
        Auth::user()->subscribed_talks()->detach($talk);
        $talk->available_places++;
        $talk->save();
        return redirect(route('talks.one', $talk->id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Talk  $talk
     * @return \Illuminate\Http\Response
     */
    public function edit(Talk $talk)
    {
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
        $validatedAttr = $request->validate([
            'title' => 'required|max:191',
            'excerpt' => 'required',
            'body' => 'required',
            'speaker' => 'required|max:191',
            'start_time' => 'required',
            'end_time' => 'required',
            'max_places' => 'required'
        ]);

        if ($request->hasFile('photo') && $request->file('photo')->isValid()){
            $request->validate(['photo' => 'mimes:jpg,jpeg,png|max:10000']);

            Storage::delete('public//' . $talk->photo);

            $validatedAttr['photo'] = request('photo')->store('uploads', 'public');
        }

        $talk->update($validatedAttr);
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
        Storage::delete('public//' . $talk->photo);
        $talk->delete();
        return redirect(route('talks.index'));
    }
}
