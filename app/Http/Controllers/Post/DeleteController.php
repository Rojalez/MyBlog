<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class DeleteController extends BaseController
{
    public function __invoke(Request $request, Post $post)
    {
        if ($request->user()->cannot('delete', $post)) {
            abort(401);
        }
        $post->delete();
        alert(__("Пост {$post->title} удален!"));
        return redirect()->route('post.index');
    }
}
