<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class EditController extends BaseController
{
    public function __invoke($post_id)
    {
        $categories = Category::all();
        $post = Post::find($post_id);
        $tags = Tag::all();
        return view('posts.edit', compact('post', 'categories', 'tags'));
    }
}
