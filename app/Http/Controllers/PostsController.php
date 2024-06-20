<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Helpers\TextHelper;
use App\Models\Post;
use Illuminate\Contracts\View\View;

class PostsController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $posts = Post::all()->map(function ($post) {
            $post->description = TextHelper::shortenDescription($post->description);
            return $post;
        });

        return view('page.posts', compact('posts'));
    }

    /**
     * @param $id
     * @return View
     */
    public function show($id): View
    {
        $post = Post::find($id);

        if (!$post) {
            abort(404);
        }

        return view('post.post', compact('post'));
    }
}
