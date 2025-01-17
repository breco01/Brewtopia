<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048', // afbeelding validatie
        ]);

        $article = new Article();
        $article->title = $validated['title'];
        $article->content = $validated['content'];

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('articles', 'public');
            $article->image_path = $path;
        }

        $article->published_at = now();

        $article->save();

        return redirect()->route('articles.index')->with('status', 'Nieuwsartikel succesvol toegevoegd!');
    }

    public function index()
    {
        $articles = Article::latest()->get();

        return view('welcome', compact('articles'));
    }
}
