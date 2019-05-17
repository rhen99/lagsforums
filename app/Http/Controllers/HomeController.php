<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('users.home')->with('user', $user);
    }
    public function edit_user($id){
        $user = User::find($id);
        if(auth()->user()->id !== $user->id){
            return redirect('/home')->with('error', 'Unauthorized Action');
        }
        return view('users.edit')->with('user', $user);
    }
    public function update_user(Request $request, $id){
        $this->validate($request, [
            'name' => 'required|max:255',
            'profile_picture' => 'image|max:1999'
        ]);
        if($request->hasFile('profile_picture')){
            $filenameWithExt = $request->file('profile_picture')->getClientOriginalName();

            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            $extension  = $request->file('profile_picture')->getClientOriginalExtension();

            $filenameToStore = $filename.'_'.time().'.'.$extension;

            $path = $request->file('profile_picture')->storeAs('public/profile_pictures', $filenameToStore);
        }
        

        $user = User::find($id);
        $user->name = $request->input('name');
        if($request->hasFile('profile_picture')){
            $user->profile_picture = $filenameToStore;
        }
        
        $user->save();

        return redirect('/home')->with('success', 'User Updated');
    }
}
