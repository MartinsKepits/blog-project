<?php

declare(strict_types=1);

namespace App\View\Components;

use App\Models\Post;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Helpers\TextHelper;

class TopRatedPosts extends Component
{
    /**
     * @var mixed
     */
    private $posts;

    public function __construct()
    {
        $this->posts = $this->getTopRatedPosts();
    }

    /**
     * @return mixed
     */
    public function getTopRatedPosts(): mixed
    {
        return Post::with(['ratings' => function ($query) {
            $query->select('post_id', 'rating');
        }])
            ->withCount('ratings')
            ->get()
            ->sortByDesc(fn($post) => $post->ratings->avg('rating'))
            ->take(6)
            ->map(fn($post) => $this->shortenDescription($post));
    }

    /**
     * @param $post
     * @return mixed
     */
    private function shortenDescription($post): mixed
    {
        $post->description = TextHelper::shortenDescription($post->description);
        return $post;
    }

    /**
     * @return View|Closure|string
     */
    public function render(): View|Closure|string
    {
        return view('components.top-rated-posts', [
            'posts' => $this->posts,
        ]);
    }
}
