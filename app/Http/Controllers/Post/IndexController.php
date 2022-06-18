<?php

namespace App\Http\Controllers\Post;

use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;

class IndexController extends BaseController
{
    public function __invoke(FilterRequest $request)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $users = User::all();
//        $urlWithQueryString = $request->fullUrlWithoutQuery('tags');
        $data = $request->validated();
        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
        $posts = Post::filter($filter)->paginate(10);
        return view('posts.index', compact('posts', 'tags', 'categories', 'users'));
    }
}
