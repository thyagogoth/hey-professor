<?php

use App\Models\{Question, User};

use function Pest\Laravel\{actingAs, assertDatabaseHas, post};

it('should be able to like a question', function () {
    $user     = User::factory()->create();
    $question = Question::factory()->create();

    actingAs($user);

    post(route('question.like', $question->id))
        ->assertRedirect();

    assertDatabaseHas('votes', [
        'question_id' => $question->id,
        'user_id'     => $user->id,
        'like'        => 1,
        'unlike'      => 0,
    ]);

});

it('should not be able to like more 1 time', function () {
    $user     = User::factory()->create();
    $question = Question::factory()->create();

    actingAs($user);

    post(route('question.like', $question->id));
    post(route('question.like', $question->id));
    post(route('question.like', $question->id));
    post(route('question.like', $question->id));

    expect(
        $user->votes()->where('question_id', '=', $question->id)->get()
    )
        ->toHaveCount(1);
});

it('should be able to unlike a question', function () {
    $user     = User::factory()->create();
    $question = Question::factory()->create();

    actingAs($user);

    post(route('question.unlike', $question->id))
        ->assertRedirect();

    assertDatabaseHas('votes', [
        'question_id' => $question->id,
        'user_id'     => $user->id,
        'like'        => 0,
        'unlike'      => 1,
    ]);

});

it('should not be able to unlike more 1 time', function () {
    $user     = User::factory()->create();
    $question = Question::factory()->create();

    actingAs($user);

    post(route('question.unlike', $question->id));
    post(route('question.unlike', $question->id));
    post(route('question.unlike', $question->id));
    post(route('question.unlike', $question->id));

    expect(
        $user->votes()->where('question_id', '=', $question->id)->get()
    )
        ->toHaveCount(1);
});
