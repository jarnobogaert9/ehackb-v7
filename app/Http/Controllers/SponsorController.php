<?php

namespace App\Http\Controllers;

use App\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SponsorController extends Controller
{
    function removeImage($fileName){
        $path = public_path('imgs'.DIRECTORY_SEPARATOR.'sponsors'.DIRECTORY_SEPARATOR.$fileName);
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
        return view('sponsors.index', ['sponsors' => Sponsor::all()->sortBy('tier')]);
    }

    public function admin_index()
    {
        return view('admin.sponsors', ['sponsors' => Sponsor::all()->sortBy('tier')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sponsors.create');
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
            'tier' => 'required',
            'logo' => 'required|mimes:jpg,jpeg,png|max:10000',
            'url' => 'required|max:191'
        ]);

        if ($request->file('logo')->isValid()){
            $validatedAttr['logo'] = request('logo')->store('uploads', 'public');
        }

        $sponsor = Sponsor::create($validatedAttr);
        return redirect(route('adminpanel.sponsors'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function edit(Sponsor $sponsor)
    {
        return view('sponsors.edit', ['sponsor' => $sponsor]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sponsor $sponsor)
    {
        $validatedAttr = $request->validate([
            'name' => 'required|max:191',
            'tier' => 'required',
            'url' => 'required|max:191'
        ]);

        if ($request->hasFile('logo') && $request->file('logo')->isValid()){
            $request->validate(['logo' => 'mimes:jpg,jpeg,png|max:10000']);

            Storage::delete('public//' . $sponsor->logo);

            $validatedAttr['logo'] = request('logo')->store('uploads', 'public');
        }

        $sponsor->update($validatedAttr);
        return redirect(route('adminpanel.sponsors'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sponsor $sponsor)
    {
        Storage::delete('public//' . $sponsor->logo);
        $sponsor->delete();
        return redirect(route('adminpanel.sponsors'));
    }
}
