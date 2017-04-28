<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUser;
use App\User;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{

    public function create()
    {
        return view('registration.create');
    }

    public function store(StoreUser $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        // login
        Auth::login($user);
//        \auth()->login($user);
        return redirect()->route('ad.index');
    }
}
