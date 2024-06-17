<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * @return View|RedirectResponse
     */
    public function index(): View|RedirectResponse
    {
        if (Auth::check()) {
            return view('post.create');
        }

        return redirect()->route('auth');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function create(Request $request): RedirectResponse
    {
        if (!Auth::check()) {
            return redirect()->route('auth');
        }

        $request->validate(
            [
                'title' => 'required|min:8',
                'description' => 'required|min:50',
            ],
            [
                'title.required' => 'Post title is required.',
                'title.min' => 'Post title must be at least 8 characters.',
                'description.required' => 'Post description is required.',
                'description.min' => 'Post description must be at least 50 characters.'
            ]
        );

        $postCredentials = $request->all();
        $user = Auth::user();
        $postCredentials['author'] = $user['firstname'] . ' ' . $user['lastname'];
        $postCredentials['post_author_id'] = Auth::id();
        $errMsg = [
            'createPostErr' => 'Sorry something went wrong. Please try again.'
        ];

        try {
            Post::create($postCredentials);
        } catch (\Exception $e) {
            // Log the error message
            Log::error('Post creation failed: ' . $e->getMessage());

            // Redirect back with an error message
            return redirect()->back()->withErrors($errMsg);
        }

        return redirect()->route('profile');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function delete(Request $request): RedirectResponse
    {
        $postId = $request->input('post_id');
        $post = Post::find($postId);

        if (!$post) {
            return redirect()->back();
        }

        if ($post->post_author_id !== Auth::id()) {
            return redirect()->back();
        }

        $post->delete();

        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request): RedirectResponse
    {
        if (!Auth::check()) {
            return redirect()->route('auth');
        }

        $rules = [
            'title' => 'required|min:8',
            'description' => 'required|min:50',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back();
        }

        try {
            $post = Post::findOrFail($request->post_id);
            $post->update($request->only(['title', 'description']));

            return redirect()->route('profile');
        } catch (\Exception $e) {
            // Log the error message
            Log::error('Post update failed: ' . $e->getMessage());

            // Redirect back
            return redirect()->back();
        }
    }
}
