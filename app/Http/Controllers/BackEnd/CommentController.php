<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    function getComment()
    {
        return view('backend.comment.comment');
    }

    function getEditComment()
    {
        return view('backend.comment.editcomment');
    }
}
