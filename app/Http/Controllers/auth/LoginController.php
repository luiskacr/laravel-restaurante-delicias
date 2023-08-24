<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\View\View;

class LoginController extends Controller
{
    /**
     * Display the login view.
     *
     * @return View|RedirectResponse
     */
    public function show(): View|RedirectResponse
    {
        if(Auth::check()){
            return redirect('admin.home');
        }
        return view('auth.login');
    }
    /**
     * Validates and authenticates login credentials
     *
     * @param LoginRequest $request
     * @return RedirectResponse
     */
    public function login(LoginRequest $request):RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email','string'],
            'password' => ['required','string'],
        ]);


        if($this->validateRateLimit($request))
        {
            $block_time = RateLimiter::availableIn($this->throttleKey( $request->get('email'), $request->ip() ));

            return redirect()->to('/')->with('error', __('app.throttled',['time' => $block_time ]));
        }

        if(Auth::attempt($credentials, $request->request->getBoolean('remember')))
        {
            $request->session()->regenerate();

            RateLimiter::clear($this->throttleKey( $request->get('email'), $request->ip() ));

            return redirect()->intended('/admin');
        }

        RateLimiter::hit($this->throttleKey( $request->get('email'), $request->ip() ));

        return redirect()->to('/')->with('error', __('app.user_error'));

    }

    /**
     * Destroy an authenticated session.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function logout(Request $request):RedirectResponse
    {
        Session::flush();
        Auth::logout();

        return redirect()->to('/');
    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @param LoginRequest $request
     * @return bool
     */
    public function validateRateLimit(LoginRequest $request):bool
    {
        $email = $request->get('email');
        $ip = $request->ip();

        if (! RateLimiter::tooManyAttempts($this->throttleKey($email,$ip), 5))
        {
            return false;
        }

        event(new Lockout($request));

        return true;
    }

    /**
     * Get the rate limiting throttle key for the request.
     *
     * @param string $email
     * @param string $ip
     * @return string
     */
    public function throttleKey(string $email,string $ip):string
    {
        return Str::transliterate(Str::lower($email.'|'.$ip));
    }
}
