<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Image;
use App\Models\Price;
use App\Models\Material;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = auth()->user()->latest()->paginate();
        return view('articles.index', compact('articles'));
    }

    /**
     * Display a listing of the deleted resource.
     */
    public function deleted()
    {
        $articles = Article::onlyTrashed()->orderBy('deleted_at')->paginate();
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $material = Material::all();
        return view('articles.create',compact('material'));
        
        $price = Price::all();
        return view('articles.create',compact('price'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        $article = new Article($request->validated());
        $article->user()->associate(auth()->user());
        $article->save();


        if ($request->file('images')){
            foreach ($request->file('images') as $image){
                $file = $image->store('/public');
                $img = new Image();
                $img->path = Storage::url($file);
                $img->article()->associate($article);
                $img->save();
            }
        }

        if ($request->input('material')){
            foreach ($request->input('material') as $MaterialId){
                $article->materials()->attach($MaterialId);
            }
        }

        if ($request->input('price')){
            foreach ($request->input('price') as $PriceId){
                $article->prices()->attach($PriceId);
            }
        }

        if ($request->input('users')){
            foreach ($request->input('users') as $UserId){
                $article->users()->attach($UserId);
            }
        }

        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('articles.view', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
//        $article->title = $request->validated('title');
//        $article->body = $request->validated('body');
        $article->fill($request->validated());
        $article->save();
        return redirect()->route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index');
    }
}
