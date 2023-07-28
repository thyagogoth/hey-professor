<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\{RedirectResponse, Request};

class PublishController extends Controller
{
    public function __invoke(Question $question): RedirectResponse
    {
        $question->update([
            'draft' => false,
        ]);

        return back();
    }
}
