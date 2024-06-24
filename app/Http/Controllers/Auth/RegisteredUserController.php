<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // $request->validate([
        //     'nickname' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
        //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
        //     'gender' => ['required'],
        //     'age' => ['required'],
        //     'ballet_career' => ['required'],
        //     'ballet_level' => ['required'],
        //     'foot_shape' => ['required'],
        //     'foot_size' => ['required'],
        //     'foot_width' => ['required'],
        //     'foot_height' => ['required'],
        //     'mail_magazin' => ['required'],
        //     'tos_confirm' => ['required'],
        //     'privacy_policy_confirm' => ['required'],
        // ]);

        // dd($request);

        $user = User::create([
            'nickname' => $request->nickname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'age' => $request->age,
            'ballet_career' => $request->ballet_career,
            'ballet_level' => $request->ballet_level,
            'foot_shape' => $request->foot_shape,
            'foot_size' => $request->foot_size,
            'foot_width' => $request->foot_width,
            'foot_height' => $request->foot_height,
            'mail_magazin' => $request->mail_magazin,
            'tos_confirm' => $request->tos_confirm === 'on' ? 1 : 0, // Convert 'on' to 1 (true) and any other value to 0 (false)
            'privacy_policy_confirm' => $request->privacy_policy_confirm === 'on' ? 1 : 0, // Convert 'on' to 1 (true) and any other value to 0 (false)
            'type' => 0,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('home', absolute: false));
    }
}
