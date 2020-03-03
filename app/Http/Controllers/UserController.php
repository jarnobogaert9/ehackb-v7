<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
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
        return view('admin.users', ['users' => User::all()]);
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
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        if ($user->exists){
            return view('users.profile', ['user' => $user]);
        }
        return view('users.profile', ['user' => Auth::user()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        // dd($user);
        return view('users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validatedAttr = $request->validate([
            'username' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
        ]);

        // Check if email is the same as before otherwise check if it is already in use by someone else
        $formEmail = $request->email;

        if ($formEmail == $user->email) {
            // Used same email as before
            dd('Same email');
        } else{
            // Check if email is already used by other users
            $users = User::all();
            foreach ($users as $user) {
                if ($user->email == $formEmail) {
                    return Redirect::back()->with('emailErr', 'Email is already in use');
                    // return Redirect::back()->withErrors(['email', 'Email is already in use']); // Not working
                } else{
                    // No user with same email
                }
            }
        }
    }

    public function toggleAdmin(User $user)
    {
        if ($user->role == 0){
            $user->role = 2;
        }
        else if($user->role == 2){
            $user->role = 0;
        }
        $user->save();
        return redirect(route('adminpanel.users'));
    }

    public function toggleCashier(User $user)
    {
        if ($user->role == 3){
            return redirect(route('adminpanel.users'));
        }
        else if ($user->role == 0){
            $user->role = 1;
        }
        else if($user->role == 1){
            $user->role = 0;
        }
        $user->save();
        return redirect(route('adminpanel.users'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        if ($user->id === Auth::user()->id) {
            Auth::logout();
            return redirect(route('home'));
        }
        return redirect(route('adminpanel.users'));
    }
}
