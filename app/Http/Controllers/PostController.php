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
use App\Models\Rating;

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

        return redirect()->route('auth')->with('pageErrMessage', 'You must be logged in to create new posts.');
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

        try {
            Post::create($postCredentials);
        } catch (\Exception $e) {
            // Log the error message
            Log::error('Post creation failed: ' . $e->getMessage());

            // Redirect back with an error message
            return redirect()->back()->with('pageErrMessage', 'Sorry something went wrong. Please try again.')->withInput();
        }

        return redirect()->route('profile')->with('pageSuccessMessage', 'You successfully created a new post.');
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
            return redirect()->back()->with('pageErrMessage', 'Sorry something went wrong. Please try again.');
        }

        if ($post->post_author_id !== Auth::id()) {
            return redirect()->back()->with('pageErrMessage', 'Sorry you are not allowed to delete this post.');
        }

        $post->delete();

        return redirect()->back()->with('pageSuccessMessage', 'You successfully deleted a post.');
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
            return redirect()->back()->with('pageErrMessage', 'Sorry something went wrong. Please try again.');
        }

        try {
            $post = Post::findOrFail($request->post_id);
            $post->update($request->only(['title', 'description']));

            return redirect()->route('profile')->with('pageSuccessMessage', 'You successfully updated a post.');
        } catch (\Exception $e) {
            // Log the error message
            Log::error('Post update failed: ' . $e->getMessage());

            // Redirect back
            return redirect()->back()->with('pageErrMessage', 'Sorry something went wrong. Please try again.');
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function rate(Request $request, $id): RedirectResponse
    {
        if (!Auth::check()) {
            return redirect()->route('auth')->with('pageErrMessage', 'You must be logged in to rate a posts.');
        }

        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Rating::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'post_id' => $id,
            ],
            ['rating' => $request->rating]
        );

        return redirect()->back()->with('pageSuccessMessage', 'Rating submitted!');
    }
}
