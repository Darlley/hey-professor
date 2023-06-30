<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Rules\EndWithQuestionMarkRule;
use Illuminate\Http\RedirectResponse;

class QuestionController extends Controller
{
    public function index() 
    {
        return view('question.index', [
            'questions' => user()->questions,
        ]);
    }

    public function store(): RedirectResponse
    {
        $messages = [
            'required' => 'A :attribute é obrigatoria.',
        ];

        request()->validate([
            'question' => [
                'required',
                'min:10',
                new EndWithQuestionMarkRule()
            ],
        ], $messages);

        user()->questions()->create([
            'question' => request()->question,
            'draft' => true
        ]);

        return back();
    }

    public function edit(Question $question)
    {
        return view('question.edit', [
            'question' => $question
        ]);
    }

    public function destroy(Question $question)
    {
        $this->authorize('destroy', $question);

        $question->delete();

        return back();
    }
}
