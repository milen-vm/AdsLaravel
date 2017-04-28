<?php

namespace App\Http\Controllers;

use App\Ad;
use App\Http\Requests\StoreComment;

class CommentsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(StoreComment $request, Ad $ad)
    {
        $ad->addComment($request->text);

//        return redirect(url('/ads/' . $ad->id));
        return back();
    }
}
