<?php

namespace App\Http\Controllers;

use App\Talk;
use Illuminate\Http\Request;

class MultiStepController extends Controller
{
    public function talks()
    {
        return view('auth.register.talks', ['talks' => Talk::all()]);
    }

    public function subscribeTalks(Request $request){

    }
}
