<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class ShowController extends BaseController
{
    public function __invoke(User $user, Post $post)
    {
        return view('posts.show', compact('post', 'user'));
    }
}
