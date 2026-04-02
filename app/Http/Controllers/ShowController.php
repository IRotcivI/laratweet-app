<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class ShowController extends Controller
{
    public function index($slug)
    {
        return view('front.show',
            [
                'post' => \App\Models\Post::where('slug', $slug)->first(),
                'categories' => \App\Models\Category::all(),
            ]
        );
    }
}
