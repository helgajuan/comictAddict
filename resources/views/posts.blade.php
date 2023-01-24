@extends('layouts.main')

@section('container')

<h1 class="mb-3 text-center">{{ $title }}</h1>

<div class="row justify-content-center mb-3">
  <div class="col-md-6">
    <form action="/posts">
      @if(request('category'))
        <input type="hidden" name="category" value="{{ request('category') }}">
      @endif

      @if(request('author'))
        <input type="hidden" name="category" value="{{ request('author') }}">
      @endif

      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}">
        <button class="btn btn-danger" type="submit">Search</button>
      </div>
    </form>
  </div> 
</div>

@if ($comics->count())
<div class="card mb-3 text-center">
    <a href="/posts/{{ $comics[0]->slug }}">
      @if ($comics[0]->image)
      <img src="{{ asset('storage/' . $comics[0]->image) }}" alt="{{ $comics[0]->category->name }}" class="img-fluid">
      @else
      <img src="https://source.unsplash.com/1200x400/?{{ $comics[0]->category->name }}" alt="{{ $comics[0]->category->name }}" class="img-fluid">    
      @endif
    </a>
    <div class="card-body">
      <h3 class="card-title"><a class="text-decoration-none text-dark" href="/posts/{{ $comics[0]->slug }}">{{ $comics[0]->title }}</a></h3>
        <p>
        <small class="text-muted">
        By : <a href="/posts?author={{ $comics[0]->author->username }}" class="text-decoration-none">{{ $comics[0]->author->name }}</a> in <a class="text-decoration-none" href="/posts?category={{ $comics[0]->category->slug }}"> {{ $comics[0]->category->name }} </a> {{ $comics[0]->created_at->diffForHumans() }}
        </small>
        </p>
        <p>{{ $comics[0]->excerpt }}</p>
        <a class="text-decoration-none btn btn-primary" href="/posts/{{ $comics[0]->slug }}">Baca Komik!</a>
    </div>
</div>

<div class="container">
    <div class="row">
        @foreach($comics->skip(1) as $comic)
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="position-absolute bg-dark px-3 py-2 text-white" style="--bs-bg-opacity: .8"><a class="text-decoration-none text-white" href="/posts?category={{ $comic->category->slug }}">{{ $comic->category->name }}</a></div>
                {{-- <a href="/posts/{{ $comic->slug }}"> --}}
                  @if ($comic->image)
                  <img src="{{ asset('storage/' . $comic->image) }}" alt="{{ $comic->category->name }}" class="img-fluid">
                  @else
                  <img src="https://source.unsplash.com/300x400/?{{ $comic->category->name }}" alt="{{ $comic->category->name }}" class="img-fluid">    
                  @endif
                {{-- </a> --}}
                <div class="card-body">
                  <a href="/posts/{{ $comic->slug }}" class="text-decoration-none text-dark"><h5 class="card-title">{{ $comic->title }}</h5></a>
                  <p>
                    <small class="text-muted">
                    By : <a href="/posts?author={{ $comic->author->username }}" class="text-decoration-none">{{ $comic->author->name }}</a> {{ $comic->created_at->diffForHumans() }}
                    </small>
                    </p>
                  <p class="card-text">{{ $comic->excerpt }}</p>
                  <a href="/posts/{{ $comic->slug }}" class="btn btn-primary">Baca Komik!</a>
                </div>
              </div>
        </div>
        @endforeach
    </div>
</div>

@else
    <p class="text-center fs-4">No Comic Found!</p>
@endif

  <div class="d-flex justify-content-center mt-5 mb-5">
    {{ $comics->links() }}
  </div>



@endsection