<?php

namespace App\Http\Controllers;

use App\Talk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MultiStepController extends Controller
{
    public function talks()
    {
        return view('auth.register.talks', ['talks' => Talk::all()]);
    }

    public function subscribeTalks(Request $request){
        $data = $request->validate([
            'requestedTalks' => 'array',
            'requestedTalks.*' => 'distinct|exists:talks,id'
        ]);

        foreach ($data['requestedTalks'] as $currId){
            $talk = Talk::find($currId);
            if ($talk->available_places > 0) {
                Auth::user()->subscribed_talks()->attach($talk);
                $talk->available_places--;
                $talk->save();
            }
        }

        return view('users.profile', ['user' => Auth::user()]);
    }
}
