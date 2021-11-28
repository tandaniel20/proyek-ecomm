<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        //
    }

    public function checkLogin(Request $request){
        $test = $request->validate([
            'email' => ['required'],
            'password' => ['required']
        ]);

        $users = User::all();
        // dd($users);
        if (count($users)>0){
            if (Auth::attempt($test)){
                // dd(Auth::user());
                return redirect('/');
            }
        }

        if ($request->email == 'admin' && $request->password == 'admin'){
            $request->session()->put("loggedIn", 'admin');
            return redirect('/admin');
        }

        return redirect('/');

        // $user = User::where([
        //     ['email', $request->email],
        // ])->first();
        // // dd($user);

        // if ($user != null){
        //     if (Hash::check($request->password,$user->password)){
        //         $request->session()->put("loggedIn", $user->email);
        //         $request->session()->flash("status_login", "Login Sukses ".$user->name);
        //     }else $request->session()->flash("status_login", "Password salah");
        // }else $request->session()->flash("status_login", "User Not Found!");
        // return redirect('/');
    }

    function logOut(Request $request){
        Auth::logout();
        return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:user,email',
            'password' => 'required',
        ]);
        $user = new User;
        $user->name = $validatedData["name"];
        $user->email = $validatedData["email"];
        $user->password = Hash::make($validatedData["password"]);
        $user->save();
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect('/');
        }
        return redirect('/');
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
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
