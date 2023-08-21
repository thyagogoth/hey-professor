<?php

namespace App\Http\Controllers\Auth\Google;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class CallbackController extends Controller
{
    public function __invoke()
    {
        $googleUser = Socialite::driver('google')->user();

        $user = User::updateOrCreate([
            'email' => $googleUser->email,
        ], [
            'name' => $googleUser->name,
            'email' => $googleUser->email,
            'password' => bcrypt($googleUser->token),
            'email_verified_at' => now()
        ]);

        Auth::login($user);

        return redirect('/dashboard');
    }
}
