<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class HomeController extends Controller
{
    public function index($category_id = null)
    {
        return view('front.home', [
            'posts' => Post::when($category_id, function ($query, $category_id) {
                $query->where('category_id', $category_id);
            })->get(),
            'categories' => Category::all(),
        ]);
    }
}
