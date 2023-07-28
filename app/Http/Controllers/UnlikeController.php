<?php

namespace App\Http\Controllers;

use App\Models\{Question, User};
use Illuminate\Http\{RedirectResponse, Request};

class UnlikeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Question $question): RedirectResponse
    {
        /** @var User $user */
        $user = auth()->user();
        $user->unlike($question);

        return back();
    }
}
