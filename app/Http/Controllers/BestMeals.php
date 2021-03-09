<?php

namespace App\Http\Controllers;

use App\Models\BestMeal;
use Illuminate\Http\Request;

class BestMeals extends Controller
{
    public function index()
    {
        return view('admin/bestmeals');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'desc' => 'required|max:255',
            'price' => 'required|max:7',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048'

        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('adminImages'), $imageName);

        BestMeal::create([
            'name' => $request->name,
            'desc' => $request->desc,
            'price' => $request->price,
            'image' => $request->$imageName
        ]);

        return back()->with('registeredSuccessfully', 'Meal successfully added!');
    }
}
