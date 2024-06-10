<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
public function store(Request $request)
{
    $request->validate([
        'CIN' => 'required|string|max:255',
        'pin_code' => 'required|string|max:255',
        'email' => 'required|string|email|max:255',
    ]);

    // Check if the provided CIN, pin_code, and email exist in the database
    $user = User::join('user_profiles', 'users.id', '=', 'user_profiles.user_id')
    ->where('user_profiles.CIN', $request->CIN)
    ->where('user_profiles.pin_code', $request->pin_code)
    ->where('users.email', $request->email)
    ->select('users.*') // Select all columns from the users table
    ->first();


    if (!$user) {
        // If the user is not found, throw a validation exception
        throw ValidationException::withMessages([
            'CIN' => ['Invalid CIN, pin_code, or email.'],
        ]);
    }

    Auth::login($user);

    if ($user->hasRole('user')) {
        return redirect(RouteServiceProvider::HOMEUSER);
    } else {
        return redirect(RouteServiceProvider::HOME);
    }
}
}
