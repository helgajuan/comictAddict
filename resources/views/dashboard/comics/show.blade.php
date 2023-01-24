@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <div class="row my-3">
        <div class="col-md-8">
        <h2 class="mb-3 fw-semibold">{{ $comic->title }}</h2>
        <a href="/dashboard/comics" class="btn btn-success"><span data-feather="arrow-left"></span> Back To My Comics</a>
        <a href="/dashboard/comics/{{ $comic->slug }}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
        <form action="/dashboard/comics/{{ $comic->slug }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')"><span data-feather="trash-2"></span>Delete</button>
        </form> 

        {{-- @if ($comic->image)
            <img class="mt-3 mb-2 col-sm-8" src="{{ asset('storage/' . $comic->image) }}" alt="{{ $comic->category->name }}" class="img-fluid">
        @else
            <img class="mt-3" src="https://source.unsplash.com/800x400/?{{ $comic->category->name }}" alt="{{ $comic->category->name }}" class="img-fluid">    
        @endif --}}

            <article class="my-3 fs-5">
                @for ($i = 0; $i < $comic->pages; $i++)
                <img src="https://source.unsplash.com/600x1200/?{{ $comic->category->name }}" alt="{{ $comic->category->name }}" class="img-fluid">
                @endfor
            </article>
        </div>
    </div>
</div>
@endsection