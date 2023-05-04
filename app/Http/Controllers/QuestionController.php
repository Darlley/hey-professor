<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function store(): RedirectResponse
    {
        Question::query()->create(['question' => request()->question]);
        return redirect('dashboard');
    }
}
