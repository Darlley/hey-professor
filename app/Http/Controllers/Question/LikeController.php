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
        Vote::query()->create([
            'question_id' => $question->id,
            'user_id' =>Auth::user()->id,
            'like' => 1,
            'unlike' => 0,
        ]);

        return back();
    }
}
