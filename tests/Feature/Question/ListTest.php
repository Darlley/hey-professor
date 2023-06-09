<?php

use App\Models\Question;
use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;
use function PHPUnit\Framework\assertCount;

it('should list all the questions', function(){
    // Arrange (Criar algumas perguntas)
    $user = User::factory()->create();
    $questions = Question::factory()->count(5)->create();
    
    
    // act (Acessar as rotas)
    actingAs($user);
    $response = get(route('dashboard'));


    // assert (verificar se a listagem esta sendo mostrada)
    /**
     * @var Question $q
     */
    foreach($questions as $q){
        $response->assertSee($q->question);
    }
});