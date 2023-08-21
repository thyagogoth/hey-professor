<?php

namespace App\Http\Controllers\Auth\Github;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class CallbackController extends Controller
{
    public function __invoke()
    {
        $githubUser = Socialite::driver('github')->user();

        $user = User::updateOrCreate([
//            'github_user_id' => $githubUser->id,
            'email' => $githubUser->email,
        ], [
            'name' => $githubUser->name,
            'email' => $githubUser->email,
            'password' => bcrypt($githubUser->token),
            'github_id' => $githubUser->id ?? null,
            'email_verified_at' => now()
        ]);

        Auth::login($user);

        return redirect('/dashboard');
    }
}
