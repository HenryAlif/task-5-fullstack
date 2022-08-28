<?php

namespace App\Http\Controllers;

use App\Models\Articles;
// use App\Models\Articles;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function show(Articles $articles){
        return view('blog.post', [
            "title" => "Articles",
            "articles" => $articles
        ]);
    }
}
