<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $users_id = Auth::id();
      $articles = Article::where('user_id', $users_id)->get();
      return view('admin.posts.index', compact('articles'));
      }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $data = $request->all();

      $request->validate([
        'title' => "required|max:50",
        'content' => "required|max:500",
        'slug' => "required|max:60",
        'excerpt' => "required|max:50",
        'image' => "image",
      ]);

      $path = Storage::disk('public')->put('images', $data['image']);

      $users_id = Auth::id();
      $article = new Article;
      $article->title = $data['title'];
      $article->content = $data['content'];
      $article->excerpt = $data['excerpt'];
      $article->slug = $data['slug'];
      $article->user_id = $users_id;
      $article->image = $path;

      $article->save();

      return redirect()->route('admin.posts.index', $article);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);
        return view('admin.posts.show', ["article" => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $article = Article::find($id);
      return view('admin.posts.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $request->validate([
          'title' => "required|max:50",
          'content' => "required|max:500",
          'slug' => "required|max:60",
          'excerpt' => "required|max:50",
          'image' => "image",

        ]);

        $path = Storage::disk('public')->put('images', $data['image']);
        $article = Article::find($id);
        $article->title = $data['title'];
        $article->content = $data['content'];
        $article->excerpt = $data['excerpt'];
        $article->slug = $data['slug'];
        $article->image = $path;
        $article->update();

        return redirect()->route('admin.posts.index', $article);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();
        return redirect()->route('admin.posts.index');
    }
}
