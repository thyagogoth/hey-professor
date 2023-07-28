<?php

namespace App\Http\Controllers;

use App\Models\{Question, User};
use Illuminate\Http\{RedirectResponse, Request};

class LikeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Question $question): RedirectResponse
    {

        /** @var User $user */
        $user = auth()->user();
        $user->like($question);

        return back();
    }
}
