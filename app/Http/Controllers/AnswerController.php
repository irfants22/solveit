<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnswerController extends Controller
{
    public function store(Request $request, Question $question)
    {
        $validated = $request->validate([
            'body' => 'required|string'
        ]);

        Answer::create([
            'question_id' => $question->id,
            'user_id' => Auth::id(),
            'body' => $validated['body']
        ]);

        return back()->with('success', 'Jawaban berhasil dikirim!');
    }

    public function edit(Answer $answer)
    {
        $this->authorize('update', $answer);
        return view('answers.edit', compact('answer'));
    }

    public function update(Request $request, Answer $answer)
    {
        $this->authorize('update', $answer);

        $validated = $request->validate([
            'body' => 'required|string'
        ]);

        $answer->update($validated);

        return redirect()->route('questions.show', $answer->question_id)
            ->with('success', 'Jawaban berhasil diperbarui!');
    }

    public function destroy(Answer $answer)
    {
        $this->authorize('delete', $answer);
        $answer->delete();

        return back()->with('success', 'Jawaban berhasil dihapus!');
    }
}
