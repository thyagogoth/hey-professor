<?php

namespace App\Http\Controllers;

use Closure;
use Illuminate\Http\{RedirectResponse, Request};

class QuestionController extends Controller
{
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'question' => [
                'required',
                'min:10',
                function (string $attribute, mixed $value, Closure $fail) {
                    if ($value[strlen($value) - 1] != '?') {
                        $fail('Are you sure that is a question? It is missing the question mark.');
                    }
                },
            ],
        ]);

        /** @var \App\Models\User $user */
        $user = auth()->user();
        $user->questions()->create([
            'question' => $request->question,
            'draft'    => true,
        ]);

        return to_route('dashboard');
    }
}
