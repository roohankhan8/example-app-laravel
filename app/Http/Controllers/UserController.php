<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $incomingFields = $request->validate([
            "name" => ["required"],
            "email" => ["required", "email", Rule::unique('users', 'email')],
            "password" => ["required"],
        ]);
        $incomingFields["password"] = bcrypt($incomingFields["password"]);
        $user = User::create($incomingFields);
        auth()->login($user);
        return redirect('/');
    }
    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
    public function login(Request $request)
    {
        $incomingFields = $request->validate([
            "loginEmail" => ["required", "email"],
            "loginPassword" => ["required"],
        ]);
        if (auth()->attempt(['email' => $incomingFields['loginEmail'], 'password' => $incomingFields['loginPassword']])) {
            $request->session()->regenerate();
        }
        return redirect('/');
    }
}
