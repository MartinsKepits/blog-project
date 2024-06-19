<?php

declare(strict_types=1);

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Post;

class TopRatedPosts extends Component
{

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
        return Post::withCount('ratings')
            ->with('ratings')
            ->get()
            ->sortByDesc(function ($post) {
                return $post->ratings->avg('rating');
            })
            ->take(6)->map(function ($post) {
                $description = $post->description;

                if (strlen($description) > 100) {
                    $description = substr($description, 0, 100);
                    if (!str_ends_with($description, ' ')) {
                        $lastSpace = strrpos($description, ' ');
                        if ($lastSpace !== false) {
                            $description = substr($description, 0, $lastSpace);
                        }
                    }
                    $description .= '...';
                }

                $post->description = $description;
                return $post;
            });
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
