<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.comics.index', [
            'comics' => Comic::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.comics.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:comics',
            'category_id' => 'required',
            'excerpt' => 'required|max:255',
            'image' => 'image',
            'pages' => 'required'
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('comic-images');
        }

        $validatedData['excerpt'] = strip_tags($validatedData['excerpt']);
        $validatedData['user_id'] = auth()->user()->id;

        Comic::create($validatedData);

        return redirect('/dashboard/comics')->with('success', 'New comic has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function show(Comic $comic)
    {
        return view('dashboard.comics.show', [
            'comic' => $comic
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        return view('dashboard.comics.edit', [
            'comic' => $comic,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {
        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'excerpt' => 'required|max:255',
            'image' => 'image',
            'pages' => 'required'
        ];

        if ($request->slug != $comic->slug) {
            $rules['slug'] = 'required|unique:comics';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('comic-images');
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
        }

        $validatedData['excerpt'] = strip_tags($validatedData['excerpt']);
        $validatedData['user_id'] = auth()->user()->id;

        Comic::where('id', $comic->id)->update($validatedData);

        return redirect('/dashboard/comics')->with('success', 'Comic has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        if ($comic->image) {
            Storage::delete($comic->image);
        }
        Comic::destroy($comic->id);

        return redirect('/dashboard/comics')->with('success', 'Comic Category deleted!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Comic::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
