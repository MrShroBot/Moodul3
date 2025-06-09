<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Price;
use App\Http\Requests\StoreLikeRequest;
use App\Http\Requests\UpdateLikeRequest;

class PriceController extends Controller
{
    public function like(Article $article)
    {
        if (auth()->user()->prices()->where('article_id', $article->id)->exists()) {
            $like = auth()->user()->prices()->where('article_id', $article->id)->first();
            $like->delete();
        } else {
            $like = new Price();
            $like->user()->associate(auth()->user());
            $like->article()->associate($article);
            $like->save();
        }
        return redirect()->back();
    }
}
