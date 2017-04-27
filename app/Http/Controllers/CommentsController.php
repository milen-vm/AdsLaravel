<?php

namespace App\Http\Controllers;

use App\Ad;
use App\Comment;
use App\Http\Requests\StoreComment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{

    public function store(StoreComment $request, Ad $ad)
    {
        $ad->addComment($request->text);

//        return redirect(url('/ads/' . $ad->id));
        return back();
    }
}
