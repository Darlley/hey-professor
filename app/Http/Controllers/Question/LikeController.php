<?php

namespace App\Http\Controllers\Question;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Vote;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function __invoke(Question $question)
    {
        auth()->user()->like($question);

        return back();
    }
}
