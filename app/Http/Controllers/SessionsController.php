<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSession;
use Illuminate\Http\Request;

class SessionsController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except(['destroy']);
    }

    public function create()
    {
        return view('sessions.create');
    }

    public function store(StoreSession $request)
    {
        $result = auth()->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if (!$result) {
            return back()->withErrors([
                'message' => 'Please, check your credentials!',
            ]);
        }

        return redirect()->route('ad.index');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect()->route('ad.index');
    }
}
