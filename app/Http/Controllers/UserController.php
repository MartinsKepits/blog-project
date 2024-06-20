<?php

declare(strict_types=1);

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * @return View|RedirectResponse
     */
    public function index(): View|RedirectResponse
    {
        if (!Auth::check()) {
            return view('auth.auth');
        }

        return redirect()->route('profile')->with('pageSuccessMessage', 'You are already logged in!');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function login(Request $request): RedirectResponse
    {
        $request->validate(
            [
                'login_email' => 'required|email',
                'login_password' => 'required|min:8',
            ],
            [
                'login_email.required' => 'Email address is required.',
                'login_email.email' => 'Please enter a valid email address.',
                'login_password.required' => 'Password is required.',
                'login_password.min' => 'Password must be at least 8 characters.'
            ]
        );

        $loginCredentials = [
            'email' => $request->input('login_email'),
            'password' => $request->input('login_password'),
        ];
        $remember = $request->has('login_remember');
        $errMsg = [
            'invalidEmailOrPassword' => 'Invalid email address or password.',
        ];
        $successMsg = 'You are successfully logged in!';

        return $this->attemptLogin($request, $loginCredentials, $remember, $errMsg, $successMsg);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function register(Request $request): RedirectResponse
    {
        $request->validate(
            [
                'register_firstname' => 'required|max:255',
                'register_lastname' => 'required|max:255',
                'register_email' => 'required|email|max:255|unique:users,email',
                'register_password' => 'required|min:8',
                'register_confirm_password' => 'required|min:8|same:register_password',
            ],
            [
                'register_firstname.required' => 'First name is required.',
                'register_firstname.max' => 'Please enter no more than 255 characters.',
                'register_lastname.required' => 'Last name is required.',
                'register_lastname.max' => 'Please enter no more than 255 characters.',
                'register_email.required' => 'Email address is required.',
                'register_email.email' => 'Please enter a valid email address.',
                'register_email.unique' => 'User with this email address already exists.',
                'register_password.required' => 'Password is required.',
                'register_password.min' => 'Password must be at least 8 characters.',
                'register_confirm_password.required' => 'Password Confirmation is required.',
                'register_confirm_password.min' => 'Password Confirmation must be at least 8 characters.',
                'register_confirm_password.same' => 'Password Confirmation must match password.'
            ]
        );

        $registerCredentials = [
            'firstname' => $request->input('register_firstname'),
            'lastname' => $request->input('register_lastname'),
            'email' => $request->input('register_email'),
            'password' => $request->input('register_password')
        ];
        $remember = $request->has('register_remember');
        $errMsg = [
            'registerErr' => 'Sorry something went wrong. Please try again.'
        ];
        $successMsg = 'You are successfully registered!';

        try {
            User::create($registerCredentials);
        } catch (\Exception $e) {
            Log::error('User registration failed: ' . $e->getMessage());

            return redirect()->back()->withErrors($errMsg);
        }

        return $this->attemptLogin($request, $registerCredentials, $remember, $errMsg, $successMsg);

    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('pageSuccessMessage', 'You are successfully logged out!');
    }

    /**
     * @param Request $request
     * @param $credentials
     * @param $remember
     * @param $errMsg
     * @param $successMsg
     * @return RedirectResponse
     */
    public function attemptLogin(Request $request, $credentials, $remember, $errMsg, $successMsg): RedirectResponse
    {
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            $request->session()->regenerateToken();

            return redirect()->route('profile')->with('pageSuccessMessage', $successMsg);
        }

        return back()->withErrors($errMsg);
    }
}
