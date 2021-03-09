<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }



    public function index()
    {
        return view('register');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed|max:7',
            'password_confirmation' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048'

        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('adminImages'), $imageName);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'profileImg' => $request->$imageName
        ]);

        return back()->with('registeredSuccessfully', 'Registered successfully');
    }
}
