<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use PhpParser\Node\Stmt\Foreach_;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articles = Article::all();
        foreach ($articles as $article){
            Image::factory(rand(1,5))->create(['article_id' => $article->id]);
        }
    }
}
