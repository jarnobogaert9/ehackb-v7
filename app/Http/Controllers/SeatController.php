<?php

namespace App\Http\Controllers;

use App\Seat;
use App\Team;
use Illuminate\Http\Request;

class SeatController extends Controller
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
        return view('seats.index');
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Seat  $seat
     * @return \Illuminate\Http\Response
     */
    public function show(Seat $seat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Team $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        return view('seats.edit', ['team' => $team]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Seat  $seat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seat $seat)
    {
        //
    }

    public function claim_seats(Request $request, Team $team){
        $data = $request->validate([
            'selectedSeats' => 'array',
            'selectedSeats.*' => 'distinct|exists:seats,id'
        ]);

        foreach ($team->seats as $seat){
            $seat->team_id = null;
            $seat->save();
        }

        if (!isset($data['selectedSeats']) || count($data['selectedSeats']) > $team->members->count() + 1){
            return redirect(route('seatmap.select', $team->id));
        }

        foreach ($data['selectedSeats'] as $selectedSeat) {
            $seat = Seat::find($selectedSeat);
            if ($seat->team_id === null){
                $seat->team()->associate($team)->save();
            }
        }

        return redirect(route('seatmap.select', $team->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Seat  $seat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seat $seat)
    {
        //
    }
}
