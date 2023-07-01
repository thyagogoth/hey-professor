<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class QuestionController extends Controller
{

    public function store(Request $request): RedirectResponse
    {

        Question::query()->create(
            $request->validate([
                'question' => ['required'],
            ])
        );

        return to_route('dashboard');
    }

}
