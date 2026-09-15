<?php

/* Author: Cristian Bolaños */

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class RegisterController extends Controller implements HasMiddleware
{
    use RegistersUsers;

    protected $redirectTo = '/';

    public static function middleware(): array
    {
        return [
            new Middleware('guest'),
        ];
    }

    public function register(RegisterUserRequest $request): RedirectResponse
    {
        $user = $this->create($request->validated());
        $user->login();

        return redirect($this->redirectPath());
    }

    protected function create(array $data): User
    {
        $user = new User;
        $user->setFirstName($data['first_name']);
        $user->setLastName($data['last_name']);
        $user->setEmail($data['email']);
        $user->setPassword($data['password']);
        $user->setPhone($data['phone']);
        $user->setAddress($data['address']);
        $user->setRole('client');
        $user->setRegistrationDate(date('Y-m-d'));
        $user->setActive(true);
        $user->save();

        return $user;
    }
}
