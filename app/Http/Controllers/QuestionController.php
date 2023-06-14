<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Rules\EndWithQuestionMarkRule;
use Illuminate\Http\RedirectResponse;

class QuestionController extends Controller
{
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

        return redirect('dashboard');
    }
}
