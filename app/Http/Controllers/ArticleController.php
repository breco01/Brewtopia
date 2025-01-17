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

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.edit', compact('article'));
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return redirect()->route('articles.index')->with('status', 'Nieuwsartikel succesvol verwijderd!');
    }

    public function update(Request $request, $id)
    {
        // Validatie van het formulier
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048', // afbeelding validatie
        ]);

        // Zoek het artikel op basis van de id
        $article = Article::findOrFail($id);

        // Werk de gegevens van het artikel bij
        $article->title = $validated['title'];
        $article->content = $validated['content'];

        // Controleer of er een afbeelding is geüpload
        if ($request->hasFile('image')) {
            // Verwijder de oude afbeelding als die er is
            if ($article->image_path) {
                Storage::delete($article->image_path);
            }

            // Sla de nieuwe afbeelding op en update het pad
            $path = $request->file('image')->store('public/articles');
            $article->image_path = $path;
        }

        // Werk de publicatiedatum bij indien nodig
        // $article->published_at = now();  // Of houd de oude publicatiedatum

        // Sla de wijzigingen op
        $article->save();

        // Redirect naar het artikel overzicht of de bewerk pagina met succesmelding
        return redirect()->route('articles.index')->with('status', 'Artikel succesvol bijgewerkt!');
    }



}
