@extends('partials.layout')

@section('content')

    <div class="container mx-auto">

            <a class="btn btn-primary mr-3 mb-4" href="./">Back</a>

                <div class="card w-96 bg-base-100 shadow-xl h-full">
                    @if($article->images->count() === 1)
                        <figure><img src="{{$article->image->path}}" alt="Shoes"/></figure>
                    @elseif($article->images->count() > 1)
                        <div class="h-96 carousel carousel-vertical">
                            @foreach($article->images as $image)
                                <div class="carousel-item h-full">
                                    <img src="{{$image->path}}"/>
                                </div>
                            @endforeach
                        </div>
                @endif
                        <div class="card-body">
                            <h2 class="card-title">{{ $article->title }}</h2>
                            <p>{{ $article->snippet }}</p>
                            <div class="stat">
                                <div class="stat-desc">{{ $article->user->name }}</div>
                                <div class="stat-desc"><b>Comments: </b>{{ $article->comments()->count() }}</div>
                                <div class="stat-desc">{{ $article->created_at->diffForHumans() }}</div>
                                <div class="stat-desc flex flex-wrap">
                                    @foreach($article->tags as $tag)
                                        <a href="{{route('public.tag',['tag' => $tag])}}">
                                            <div
                                                class="stat-desc badge badge-primary badge-outline mt-1 mr-1">{{ $tag->name }}</div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                            <div class="card-actions justify-end">
                                <form action="{{route('like', ['article'=>$article])}}" method="POST">
                                    @csrf
                                    <input type="submit" class="btn btn-primary"
                                           value="{{$article->authHasLiked() ? 'Unlike' : 'Like'}}">
                                </form>
                                <a href="{{route('public.article',['article' => $article])}}" class="btn btn-primary">Comments</a>
                            </div>
                        </div>

                </div>


@endsection
