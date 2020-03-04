<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $sponsors = $this->getSponsors();
        return view("index", ['sponsors' => $sponsors]);
    }

    public function getSponsors()
    {
        $sponsorOne = $this->getTierOnes();
        $sponsorTwo = $this->getTierTwos();
        $sponsorThree = $this->getTierThrees();

        return [
            'one' => $sponsorOne,
            'two' => $sponsorTwo,
            'three' => $sponsorThree
        ];
    }

    public function getTierOnes()
    {
        $sponsorsOne = DB::table('sponsors')->where('tier', 1)->get();
        return $sponsorsOne;
    }

    public function getTierTwos()
    {
        $sponsorsTwo = DB::table('sponsors')->where('tier', 2)->get();
        return $sponsorsTwo;
    }

    public function getTierThrees()
    {
        $sponsorsThree = DB::table('sponsors')->where('tier', 3)->get();
        return $sponsorsThree;
    }
}

