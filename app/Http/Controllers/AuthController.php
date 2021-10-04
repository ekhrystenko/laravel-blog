<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Jobs\SendEmailJob;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return view('include.login');
    }

    public function login(LoginRequest $request)
    {
        $data = $request->only('email', 'password');
        auth('web')->attempt($data, $request->filled('remember'));


//        $details=['email'=>'test@ukr.net'];
//        dispatch(new SendEmailJob($details));

        return redirect()->route('home');

    }

    public function showRegister()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return view('include.register');
    }

    public function register(RegisterRequest $request)
    {
        if (!empty($request->avatar)) {
            $path = $request['avatar']->store('avatar');
        } else {
            $path = 'avatar/not.png';
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'avatar' => $path,
            'password' => Hash::make($request->password),
        ]);

        if ($user) {
            auth('web')->login($user);
        }

        SendEmailJob::dispatch($request->name, $request->email);

        return redirect()->route('home');
    }

    /**
     * @return RedirectResponse
     */
    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
            return redirect()->route('home');
        }
        return redirect()->route('home');
    }
}
