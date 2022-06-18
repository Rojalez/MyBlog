<?php

namespace App\Http\Controllers\Post;

use App\Http\Requests\Post\UpdateRequest;
use App\Models\Post;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Post $post)
    {
        if ($request->user()->cannot('update', $post)) {
            abort(401);
        }
        $data = $request->validated();

        $this->service->update($post, $data);

        alert(__('Сохранено!'));
        return redirect()->route('post.show', $post->id);
    }
}
