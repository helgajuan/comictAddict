<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Comic;
use App\Models\Category;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    public function index()
    {
        $title = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }

        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }

        return view('posts', [
            "title" => "Comics" . $title,
            "active" => "comics",
            "comics" => Comic::latest()->filter(request(['search', 'category', 'author']))->paginate(10)->withQueryString()
        ]);
    }

    public function show(Comic $comic)
    {
        return view('post', [
            "title" => "Single Post",
            "active" => "comics",
            "comic" => $comic
        ]);
    }
}
