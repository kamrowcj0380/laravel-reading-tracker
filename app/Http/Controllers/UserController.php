<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register(Request $request) {
        $incomingFields = $request->validate([
            'name' => ['required', 'min:3', Rule::unique('users', 'name')],
            'email' => ['required', 'email'], //Email can be used for multiple accounts, so don't require it to be unique
            'password' => ['required', 'min:6']
        ]);
     
        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $user = User::create($incomingFields);

        auth()->login($user);
        
        return redirect('/');
    }

    public function login(Request $request) {
        $incomingFields = $request->validate([
            'login-name' => 'required',
            'login-password' => 'required'
        ]);

        if (auth()->attempt(['name' => $incomingFields['login-name'], 'password' => $incomingFields['login-password']])) {
            $request->session()->regenerate();
        }
        
        return redirect('/');
    }

    public function logout() {
        auth()->logout();
        return redirect("/");
    }
}
