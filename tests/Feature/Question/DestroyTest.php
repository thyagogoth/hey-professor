<?php

use App\Models\{Question, User};

use function Pest\Laravel\{actingAs, assertDatabaseMissing, delete};

it('should be able to destroy a question', function () {

    $user     = User::factory()->create();
    $question = Question::factory()
        ->for($user, 'createdBy')
        ->create(['draft' => true]);

    actingAs($user);

    delete(route('question.destroy', $question->id))
    ->assertRedirect();

    assertDatabaseMissing('questions', [$question]);
});

it('should make sure that only the person who has created the question can destroy the question', function () {
    $rightUser = User::factory()->create();
    $wrongUser = User::factory()->create();
    $question  = Question::factory()->create(['draft' => true, 'created_by' => $rightUser->id]);

    actingAs($wrongUser);

    delete(route('question.destroy', $question->id))
        ->assertForbidden();

    actingAs($rightUser);

    delete(route('question.destroy', $question))
        ->assertRedirect();
});
