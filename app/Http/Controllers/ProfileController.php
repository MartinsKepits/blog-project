<?php

declare(strict_types=1);

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * @return View|RedirectResponse
     */
    public function index(): View|RedirectResponse
    {
        if (Auth::check()) {
            $user = Auth::user();
            $viewParams = [
                'firstname' => $user['firstname'],
                'lastname' => $user['lastname'],
                'email' => $user['email'],
                'created_at' => $user['created_at']->format('F j, Y'),
                'posts' => $this->getUserPosts($user['id'])
            ];

            return view('auth.profile')->with($viewParams);
        }

        return redirect()->route('auth');
    }

    /**
     * @param $userId
     * @return mixed
     */
    public function getUserPosts($userId): mixed
    {
        return Post::where('post_author_id', $userId)->get();
    }
}
