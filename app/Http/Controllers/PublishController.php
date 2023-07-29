<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\{RedirectResponse};
use Symfony\Component\HttpFoundation\Response;

class PublishController extends Controller
{
    public function __invoke(Question $question): RedirectResponse
    {

        // abort_unless(auth()->user()->can('publish', $question), Response::HTTP_FORBIDDEN);
        $this->authorize('publish', $question);

        $question->update(['draft' => false]);

        return back();
    }
}
