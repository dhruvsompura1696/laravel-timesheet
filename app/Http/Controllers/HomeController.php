<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\testMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

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
        return view('home');
    }

    public function reset_password_view()
    {
        return view('reset_password');
    }

    public function reset_password_submit(Request $r)
    {
        $r->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        #Match The Old Password
        if(!Hash::check($r->old_password, auth()->user()->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }

        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($r->password)
        ]);
        return back()->with("status", "Password changed successfully!");
    }

    public function forgot_password_submit(Request $r)
    {
        dd($r->all());
        exit;
        $r->validate([
            'email' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        $user = User::where(['email'=>$r->email])->update([
            'password' => Hash::make($r->password)
        ]);
        return back()->with("status", "Password changed successfully!");
    }
}
