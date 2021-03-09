<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }
    public function index()
    {
        return view('login');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        $credentials = $request->only('email', 'password', 'status');
        if (Auth::attempt($credentials)) {
            if (auth()->user()->status === "1") {

                $request->session()->regenerate();
                return redirect()->intended('/admin/dashboard');
            } else {
                $request->session()->regenerate();
                return redirect()->intended('user');
            }
        }
        return back()->with('status', 'Invalid login details');
    }
}
