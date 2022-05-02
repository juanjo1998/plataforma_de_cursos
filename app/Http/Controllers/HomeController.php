<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        $courses = Course::where('status','3')
        ->latest('id') //orden de manera desc
        ->get()
        ->take(8);

        return view('welcome',compact('courses'));
    }
}
