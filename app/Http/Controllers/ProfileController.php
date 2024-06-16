<?php

declare(strict_types=1);

namespace App\Http\Controllers;
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
            return view('auth.profile');
        }

        return redirect()->route('auth');
    }
}
