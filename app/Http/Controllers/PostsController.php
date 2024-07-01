<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Helpers\TextHelper;
use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $sort = $request->query('sort', 'newest');
        $sortOptions = [
            'top-rated' => 'Top Rated',
            'least-rated' => 'Least Rated',
            'newest' => 'Newest',
            'oldest' => 'Oldest'
        ];

        $postsQuery = Post::query()
            ->with('ratings')
            ->withCount('ratings');

        $sortMapping = [
            'top-rated' => function ($query) {
                return $query->withAvg('ratings', 'rating')->orderByDesc('ratings_avg_rating');
            },
            'least-rated' => function ($query) {
                return $query->withAvg('ratings', 'rating')->orderBy('ratings_avg_rating');
            },
            'newest' => function ($query) {
                return $query->orderBy('created_at', 'desc');
            },
            'oldest' => function ($query) {
                return $query->orderBy('created_at', 'asc');
            }
        ];

        $postsQuery = $sortMapping[$sort]($postsQuery) ?? $postsQuery->orderBy('created_at', 'desc');

        $posts = $postsQuery->paginate(6);

        $posts->transform(function ($post) {
            $post->description = TextHelper::shortenDescription($post->description);
            return $post;
        });

        $currentSortText = $sortOptions[$sort] ?? 'Sort by';

        return view('page.posts', compact('posts', 'sort', 'currentSortText', 'sortOptions'));
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
