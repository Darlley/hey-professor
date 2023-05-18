<?php

use App\Models\Question;
use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\post;

it('should be able to like a question', function(){
    $user = User::factory()->create();
    $question = Question::factory()->create();

    actingAs($user);

    post(route('question.like', $question))->assertRedirect();

    assertDatabaseHas('votes', [
        'question_id' => $question->id,
        'like' => 1,
        'unlike' => 0,
        'user_id' => $user->id
    ]);
    
});

it('should to be able to like more than 1 time', function(){
    $user = User::factory()->create();
    $question = Question::factory()->create();

    actingAs($user);

    for($i=0; $i < 4; $i++) { 
        post(route('question.like', $question));
    }

    expect($user->votes()->where('question_id', $question->id)->get())->toHaveCount(1);
});