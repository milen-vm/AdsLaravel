<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUser;

class RegistrationController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function create()
    {
        return view('registration.create');
    }

    public function store(StoreUser $request)
    {
        $request->persist();
        session()->flash('message', 'Thank you for your registration');

        return redirect()->route('ad.index');
    }
}
