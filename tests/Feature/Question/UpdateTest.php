<?php

use App\Models\{Question, User};

use function Pest\Laravel\{actingAs, get, put};

it('should be able to update a question', function () {
    $user     = User::factory()->create();
    $question = Question::factory()->for($user, 'createdBy')->create(['draft' => true]);

    actingAs($user);

    put(route('question.update', $question), [
        'question' => 'This is a UPDATED question?',
    ])
        ->assertRedirect();

    $question->refresh();

    expect($question->question)->toBe('This is a UPDATED question?');
});

it('should make sure that only question with status DRAFT can be updated', function () {
    $user             = User::factory()->create();
    $questionNotDraft = Question::factory()->for($user, 'createdBy')->create(['draft' => false]);

    $draftQuestion = Question::factory()->for($user, 'createdBy')->create(['draft' => true]);

    actingAs($user);

    put(route('question.update', $questionNotDraft))->assertForbidden();

    $newQuestion = [
        'question' => 'This is a UPDATED question?',
    ];
    put(route('question.update', $draftQuestion), $newQuestion)->assertRedirect();
});

it('should make sure that only the person who has created the question can update the question', function () {
    $rightUser     = User::factory()->create();
    $wrongUser     = User::factory()->create();
    $draftQuestion = Question::factory()->create(['draft' => true, 'created_by' => $rightUser->id]);

    actingAs($wrongUser);
    put(route('question.update', $draftQuestion))->assertForbidden();

    actingAs($rightUser);

    $newQuestion = [
        'question' => 'This is a UPDATED question?',
    ];
    put(route('question.update', $draftQuestion), $newQuestion)->assertRedirect();
});
