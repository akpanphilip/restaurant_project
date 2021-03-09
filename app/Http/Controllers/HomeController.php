<?php

namespace App\Http\Controllers;

use App\Models\BestMeal;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function mealsAvailable()
    {
        $meals = BestMeal::all();
        return view('/home', compact('meals'));
    }
}
