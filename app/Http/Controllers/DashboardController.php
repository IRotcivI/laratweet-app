<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back.dashboard', [
            'users' => \App\Models\User::count(),
            'posts' => \App\Models\Post::all(),
            'postsRecent' => \App\Models\Post::orderBy('created_at', 'desc')->take(10)->get(),
            'postsCount' => \App\Models\Post::count(),
            'postsRecent' => \App\Models\Post::orderBy('created_at', 'desc')->take(10)->get(),
            'categories' => \App\Models\Category::all(),
            'totalCategories' => \App\Models\Category::count(),
            'totalTags' => DB::table('tagging_tags')->count(),
        ]);
    }
}
