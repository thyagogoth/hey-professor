<?php

use App\Models\{Question, User};

use function Pest\Laravel\{actingAs, put};

it('should be able to publish a question', function () {

    $user     = User::factory()->create();
    $question = Question::factory()->create([
        'draft' => true,
    ]);

    actingAs($user);

    put(route('question.publish', $question))
    ->assertRedirect();

    /** importante esse método, para recarregar os dados
     *  depois da execução do procedimento no controller
     **/
    $question->refresh();

    expect($question)
        ->draft
        ->toBeFalse();
});
