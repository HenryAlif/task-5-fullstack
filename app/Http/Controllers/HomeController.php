<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\v1\ArticlesController;
use Illuminate\Http\Request;
use App\Models\Articles;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;


class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {

        $articles = Articles::get()->toArray();

        return view('/home', [
            "title" => "All Articles",
            "articles" => $articles
        ]);
    }
}