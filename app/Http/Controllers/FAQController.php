<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    public function create()
    {
        return view('faqs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        FAQ::create($validated);

        return redirect()->route('admin.dashboard')->with('status', 'FAQ succesvol toegevoegd!');
    }

    public function edit($id)
    {
        $faq = FAQ::findOrFail($id);
        return view('faqs.edit', compact('faq'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        $faq = FAQ::findOrFail($id);
        $faq->update($validated);

        return redirect()->route('admin.dashboard')->with('status', 'FAQ succesvol bijgewerkt!');
    }

    public function destroy($id)
    {
        $faq = FAQ::findOrFail($id);
        $faq->delete();

        return redirect()->route('admin.dashboard')->with('status', 'FAQ succesvol verwijderd!');
    }

    public function index()
    {
        $faqs = FAQ::all();
        return view('faqs.index', compact('faqs'));
    }

    public function adminIndex()
    {
        $faqs = FAQ::all();
        return view('faqs.admin.index', compact('faqs'));
    }


}
