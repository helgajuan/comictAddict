@extends('layouts.main')

@section('container')

<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
        <h2 class="mb-3 fw-semibold">{{ $comic->title }}</h2>
            <p>By : <a href="/posts?author={{ $comic->author->username }}" class="text-decoration-none">{{ $comic->author->name }}</a> in <a class="text-decoration-none" href="/posts?category={{ $comic->category->slug }}">{{ $comic->category->name }}</a></p>
            {{-- @if ($comic->image)
            <img src="{{ asset('storage/' . $comic->image) }}" alt="{{ $comic->category->name }}" class="img-fluid">
            @else
            <img class="mt-3" src="https://source.unsplash.com/800x400/?{{ $comic->category->name }}" alt="{{ $comic->category->name }}" class="img-fluid">    
            @endif --}}

            {{-- <article class="my-3 fs-5">
                {!! $comic->body !!}
            </article> --}}

            <article class="my-3 fs-8 justify-content-center">
                @for ($i = 0; $i < $comic->pages; $i++)
                <img class="mb-1" src="https://source.unsplash.com/800x1200/" alt="{{ $comic->category->name }}" class="img-fluid">
                @endfor
            </article>
        </div>
    </div>
</div>

@endsection