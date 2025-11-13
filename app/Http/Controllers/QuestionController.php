<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $questions = Question::with(['user', 'category'])
            ->latest()
            ->paginate(10);

        return view('questions.index', compact('questions'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('questions.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $path = null;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('questions', 'public');
        }

        Question::create([
            'user_id' => Auth::id(),
            'category_id' => $validated['category_id'],
            'title' => $validated['title'],
            'body' => $validated['body'],
            'image' => $path
        ]);

        return redirect()->route('questions.index')
            ->with('success', 'Pertanyaan berhasil dibuat!');
    }

    public function show(Question $question)
    {
        $question->load(['user', 'category', 'answers.user']);
        return view('questions.show', compact('question'));
    }

    public function edit(Question $question)
    {
        $this->authorize('update', $question);

        $categories = Category::all();
        return view('questions.edit', compact('question', 'categories'));
    }

    public function update(Request $request, Question $question)
    {
        $this->authorize('update', $question);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $path = $question->image;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('questions', 'public');
        }

        $question->update([
            'category_id' => $validated['category_id'],
            'title' => $validated['title'],
            'body' => $validated['body'],
            'image' => $path
        ]);

        return redirect()->route('questions.show', $question)
            ->with('success', 'Pertanyaan berhasil diperbarui!');
    }

    public function destroy(Question $question)
    {
        $this->authorize('delete', $question);
        $question->delete();

        return redirect()->route('questions.index')
            ->with('success', 'Pertanyaan berhasil dihapus!');
    }
}
