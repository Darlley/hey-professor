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
        $attributes = request()->validate([
            'question' => [
                'required',
                'min:10',
                new EndWithQuestionMarkRule()
            ],
        ], $messages);
        
        Question::query()->create([
            'question' => request()->question,
            'draft' => true
        ]);
        
        return redirect('dashboard');
    }
}