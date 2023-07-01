<?php

use App\Models\User;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseCount;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\post;

// test || it
it('should be able to create a new question bigger than 255 characters', function() {
    // Arrange > preparar
    $user = User::factory()->create();
    actingAs($user);

    // Act :  Agir
    $request = post(route('question.store'), [
        'question' => str_repeat('*', 260). '?',
    ]);

    // Assert : verificar
    $request->assertRedirect(route('dashboard'));
    assertDatabaseCount('questions', 1);
    assertDatabaseHas('questions', ['question' => str_repeat('*', 260). '?']);
});

it ( 'should check if ends with question mark ?', function () {

});

it ( 'should have at least 10 characters', function () {
    // Arrange > preparar
    $user = User::factory()->create();
    actingAs($user);

    // Act :  Agir
    $request = post(route('question.store'), [
        'question' => str_repeat('*', 8). '?',
    ]);

    // Assert : verificar
    $request->assertSessionHasErrors(['question' => __('validation.min.string', ['min' => 10, 'attribute' => 'question'])]);
    assertDatabaseCount('questions', 0);
    // assertDatabaseHas('questions', ['question' => str_repeat('*', 260). '?']);

});
