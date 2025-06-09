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
                </div>
                @foreach($article->materials as $material)
                    <a href="{{route('public.tag',['tag' => $material])}}">
                        <div class="stat-desc badge badge-primary badge-outline mt-1 mr-1">{{ $material->name }}</div>
                    </a>
                @endforeach
            </div>

    </div>


@endsection
