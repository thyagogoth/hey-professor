<?php

use App\Models\{Question, User};

use function Pest\Laravel\{actingAs, get};

it('should be able to list all questions created by me', function () {

    $wrongUser      = User::factory()->create();
    $wrongQuestions = Question::factory()
        ->for($wrongUser, 'createdBy')
        ->count(10)
        ->create();

    $user      = User::factory()->create();
    $questions = Question::factory()
        ->for($user, 'createdBy')
        ->count(10)
        ->create();

    actingAs($user);
    $response = get(route('question.index'));

    /** @var Question $q **/
    foreach ($questions as $q) {
        $response->assertSee($q->question);
    }

    /** @var Question $q **/
    foreach ($wrongQuestions as $q) {
        $response->assertDontSee($q->question);
    }

});
