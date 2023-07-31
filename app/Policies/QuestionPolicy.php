<?php

namespace App\Policies;

use App\Models\{Question, User};

class QuestionPolicy
{
    /**
     * Determine whether the user can view the model.
     */
    public function publish(User $user, Question $question): bool
    {
        return $question->createdBy->is($user);
    }

    public function update(User $user, Question $question): bool
    {
        return $question->createdBy->is($user) && $question->draft;
    }

    public function destroy(User $user, Question $question): bool
    {
        return $question->createdBy->is($user);
    }

    public function archive(User $user, Question $question): bool
    {
        return $question->createdBy->is($user);
    }

    public function restore(User $user, Question $question): bool
    {
        return $question->createdBy->is($user);
    }

}
