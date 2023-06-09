<?php // 3A's -> Arrange (Preparar), Act (Agir), Assert (Verificar)

use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseCount;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\post;
use function PHPUnit\Framework\assertCount;

it('should be able to create a new question bigger than 255 characters', function () {
    // Para testar "create a new question" é pressuposto que ja exista um usuário e ele realizará esta action e verificando este teste

    $user = User::factory()->create();
    actingAs($user);
    $request = post(route('question.store'), [
        'question' => str_repeat('*', 260) . '?',
    ]);
    // create route + controller
    $request->assertRedirect();
    // return redirect in method post in controller 
    assertDatabaseCount('questions', 1);
    // create migration + create model + question with factory
    assertDatabaseHas('questions', [
        'question' => str_repeat('*', 260) . '?'
    ]);
});

it('should check if ends with question mark ?', function () {
    $user = User::factory()->create();
    actingAs($user);

    $request = post(route('question.store'), [
        'question' => str_repeat('*', 10),
    ]);

    $request->assertSessionHasErrors([
        'question' => 'Are you sure that is a question? It is a missing the qestion mark in the end.'
    ]);
    assertDatabaseCount('questions', 0);
});

it('should have at least than 10 characters', function () {
    $user = User::factory()->create();
    actingAs($user);

    $request = post(route('question.store'), [
        'question' => str_repeat('*', 8) . "?",
    ]);

    $request->assertSessionHasErrors([
        'question' => __('validation.min.string', [
            'min' => 10, 
            'attribute' => 'question'
        ])
    ]);
    assertDatabaseCount('questions', 0);
});

it('shoul create as a draft all the time', function() {
    $user = User::factory()->create();
    actingAs($user);

    post(route('question.store'), [
        'question' => str_repeat('*', 260) . '?',
    ]);
    
    assertDatabaseHas('questions', [
        'question' => str_repeat('*', 260) . '?',
        'draft' => true
    ]);
});

it('has authenticated users can create a new question', function() {
    post(route('question.store'), [
        'question' => str_repeat('*', 260) . '?',
    ])->assertRedirect('login');
});