@extends('partials.layout')

@section('content')
    <div class="container mx-auto">
        <div class="card mx-3 bg-base-100 shadow-xl h-full">
            @if($article->image)
                <figure><img src="{{$article->image}}" alt=""/></figure>
            @endif
            <div class="card-body">

                    <p>{{ $article->body }}</p>
                    <div class="stat">
                        <div class="stat-desc">{{ $article->user->name }}</div>
                        <div class="stat-desc">{{ $article->created_at->diffForHumans() }}</div>
                        <div class="stat-desc">{{ $article->price }}</div>
                        <div class="stat-desc">{{ $article->mateial }}</div>
                    </div>

            </div>
        </div>
        <h1>Comments:</h1>
        <div class="card mx-3 bg-base-100 shadow-xl h-full mt-3">
            <div class="card-body">
                <form action="{{route('comments.store',['article'=>$article])}}" method="POST" class="card-title">
                    @csrf
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Comment</span>
                        </label>
                        <textarea name="body"
                                  class="textarea textarea-bordered @error('title') textarea-error @enderror"
                                  placeholder="Comment..."></textarea>
                        @error('body')
                        <label class="label">
                            <span class="label-text-alt text-error">{{$message}}</span>
                        </label>
                        @enderror
                    </div>
                    <input type="submit" class="btn btn-primary mt-2" value="Comment">
                </form>
            </div>
        </div>
    </div>
    @foreach($article->comments()->latest()->get() as $comment)
        <div class="card mx-3 bg-base-100 shadow-xl h-full mt-3">
            <div class="card-body">

                <h2 class="card-title">{{ $comment->title }}</h2>
                <p>{{ $comment->body }}</p>
                <div class="stat">
                    <div class="stat-desc">{{ $comment->user->name }}</div>
                    <div class="stat-desc">{{ $comment->created_at->diffForHumans() }}</div>
                </div>
            </div>
        </div>
        @endforeach
        </div>
        @endsection
