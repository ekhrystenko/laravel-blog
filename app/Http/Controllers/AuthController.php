<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Jobs\SendEmailJob;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;


class AuthController extends Controller
{
    /**
     * @return Application|Factory|View|RedirectResponse
     */
    public function showLogin(): view
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return view('include.login');
    }

    /**
     * @param LoginRequest $request
     * @return RedirectResponse
     */
    public function login(LoginRequest $request): RedirectResponse
    {
        $data = $request->only('email', 'password');
        auth('web')->attempt($data, $request->filled('remember'));

//        $details=['email'=>'test@ukr.net'];
//        dispatch(new SendEmailJob($details));

        return redirect()->route('home');
    }

    /**
     * @return Application|Factory|View|RedirectResponse
     */
    public function showRegister(): view
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return view('include.register');
    }

    /**
     * @param RegisterRequest $request
     * @return RedirectResponse
     */
    public function register(RegisterRequest $request): RedirectResponse
    {
        if (!empty($request->avatar)) {
            $path = mb_substr($request['avatar']->store('avatar'), 7);
        } else {
            $path = 'admin/not.png';
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
    public function logout(): RedirectResponse
    {
        if (Auth::check()) {
            Auth::logout();
            return redirect()->route('home');
        }
        return redirect()->route('home');
    }

    /**
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function redirectToProvider(): \Symfony\Component\HttpFoundation\RedirectResponse
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * @return RedirectResponse
     */
    public function handleProviderCallback(): RedirectResponse
    {
        $user = Socialite::driver('github')->user();
        $authUser = $this->findOrCreateUser($user);
        Auth::login($authUser, true);

        return redirect()->route('home');
    }

    /**
     * @param $user
     * @return User|Builder|Model|object
     */
    public function findOrCreateUser($user): object
    {
        $authUser = User::where('provider_id', $user->id)->first();
        if ($authUser) {
            return $authUser;
        }
        return User::create([
            'name' => $user->name,
            'email' => $user->email,
            'avatar' => $user->avatar,
            'provider' => 'github',
            'provider_id' => $user->id
        ]);
    }
}
