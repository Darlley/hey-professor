<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\RedirectResponse;

class QuestionController extends Controller
{

    public function store(): RedirectResponse
    {
        $attributes = request()->validate([
            'question' => [
                'required',
                'min:10',
                function ($attribute, $value, $fail){
                    if($value[strlen($value)-1] != "?"){
                        $fail("Are you sure that is a question? It is a missing the qestion mark in the end.");
                    }
                },
            ],
        ]);

        Question::query()->create($attributes);
        
        return redirect('dashboard');
    }


}
