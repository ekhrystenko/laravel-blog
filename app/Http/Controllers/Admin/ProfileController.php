<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProfileRequest;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $admin = User::where('is_admin', 1)->first();;
        return view('admin.profile.profile', compact('admin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return void
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return void
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProfileRequest $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(ProfileRequest $request, User $user)
    {
        $user = User::find(1)->first();
        if ($request->file(['avatar'])){
            $path = $request->file('avatar')->store('avatar');

            $user->update([
                'name' => $request['name'],
                'email' => $request['email'],
                'avatar' => mb_substr($path, 7),
                'password' => $request['password'],
            ]);
        }

        $user->update($request->except('avatar'));

        return redirect()->route('profile.index')->with('updated', 'Пользователь '.$request->name.' изменен!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return void
     */
    public function destroy(User $user)
    {
        //
    }
}
