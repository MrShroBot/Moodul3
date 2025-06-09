@extends('partials.layout')

@section('content')
    <div class="container mx-auto">
        {{$articles->links()}}
        <div class="flex flex-row flex-wrap">
            @foreach($articles as $article)
                <div class="basis-1/4 mb-4">
                    <div class="card w-100 bg-base-100 shadow-xl h-full" style="background-color:rgba(217, 217, 217, 0.53); margin: 5px;">
                        @if($article->images->count() === 1)
                            <figure><img src="{{$article->image->path}}" alt="Shoes"/></figure>
                        @elseif($article->images->count() > 1)
                            <div class="h-96 carousel carousel-vertical" >
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

                                <div class="static-desc"><b>Price:</b> {{ $article->price }}€</div>
                                <div class="static-desc"><b>Material:</b> {{ $article->material }}</div>
                            
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
