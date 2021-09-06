<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsersRequest;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    use AuthorizesRequests;

    public function __construct()
    {
        $this->authorizeResource(User::class);
    }

    public function index(Request $request)
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create(Request $request)
    {
        $user = new User();
        return view('admin.users.create', compact('user'));
    }

    public function edit(User $user, Request $request)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function store(UsersRequest $usersRequest): \Illuminate\Http\RedirectResponse
    {

        $user = new User();
        $user->name = $usersRequest->input('name');
        $user->email = $usersRequest->input('email');
        $user->password = Hash::make($usersRequest->input('password'));

        if ($usersRequest->input('email_verified')) {
            $user->email_verified_at = now();
        }

        $user->save();

        return redirect()->to(route('admin.users.edit', $user));
    }

    public function update(User $user, UsersRequest $usersRequest)
    {

        $user->name = $usersRequest->input('name');
        $user->email = $usersRequest->input('email');

        if ($password = $usersRequest->input('password')) {
            $user->password = Hash::make($password);
        }

        if ($usersRequest->input('email_verified')) {
            $user->email_verified_at = now();
        } else {
            $user->email_verified_at = null;
        }

        $user->save();

        return redirect()->to(route('admin.users.edit', $user));
    }

    public function destroy(User $user, Request $request)
    {
        if (! $user->delete()) {
            if ($request->expectsJson()) {
                abort(404);
            }
        }

        if ($request->expectsJson()) {
            return true;
        }

        return view('admin.users.index');
    }
}
