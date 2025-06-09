<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Material;
use App\Models\Price;
use App\Models\User;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(){
        $articles = Article::latest()->simplePaginate(12);
        return view('welcome', compact('articles'));
    }
    public function article(Article  $article){
        return view('article', compact('article'));
    }

    public function material(Material  $material){
        $articles = $material->articles()->paginate(12);
        return view('welcome', compact('articles'));
    }

    public function price(Price  $price){
        $articles = $price->articles()->paginate(12);
        return view('welcome', compact('articles'));
    }


    public function user(User  $user){
        $articles = $user->Users()->paginate(12);
        return view('welcome', compact('articles'));
    }

    public function about(){
        return view('about');
    }
}

