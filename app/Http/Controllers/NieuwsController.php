<?php

namespace App\Http\Controllers;

use App\Nieuws;
use Illuminate\Http\Request;

class NieuwsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('nieuws.index', ['nieuws' => Nieuws::all()]);
    }

    public function admin_index()
    {
        return view('admin.nieuws', ['nieuws' => Nieuws::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nieuws.create');
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
            'body' => 'required'
        ]);

        $nieuws = Nieuws::create($validatedAttr);

        return redirect($nieuws->path());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Nieuws  $nieuws
     * @return \Illuminate\Http\Response
     */
    public function show(Nieuws $nieuws)
    {
        return view('nieuws.detail', ['nieuws' => $nieuws]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nieuws  $nieuws
     * @return \Illuminate\Http\Response
     */
    public function edit(Nieuws $nieuws)
    {
        return view('nieuws.edit', ['nieuws' => $nieuws]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nieuws  $nieuws
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nieuws $nieuws)
    {
        $validatedAttr = $request->validate([
            'title' => 'required|max:191',
            'body' => 'required'
        ]);

        $nieuws->update($validatedAttr);
        return redirect($nieuws->path());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nieuws  $nieuws
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nieuws $nieuws)
    {
        $nieuws->delete();
        return redirect(route('nieuws.index'));
    }
}
