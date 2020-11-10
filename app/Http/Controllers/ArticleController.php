<?php

namespace App\Http\Controllers;
use App\Article;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
  public function index()
    {
        $users = User::all();
        $articles = Article::all();

        return view("guests.posts.index", compact("articles", "users"));
    }

    public function show($id)
    {
        $users = User::all();
        $article = Article::where("id", $id)->first();

        return view("guests.posts.show", compact("article", "users"));
    }
}
