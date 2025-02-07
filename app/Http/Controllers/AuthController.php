<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login(): View
    {
        return view('login', [
            'title' => 'Login'
        ]);
    }

    public function loginStore(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|min:6',
        ]);

        $isLogin = $this->authService->loginUser($credentials, $request);

        if ($isLogin) {
            return redirect()->route('dashboard')->with('success', 'Logged in successfully');
        }

        return back()->with('error', 'Invalid credentials');
    }

    public function logout(Request $request): RedirectResponse
    {
        $this->authService->logout($request);

        return redirect()->route('login')->with('success', 'Logged out successfully');
    }

    public function dashboard(): View
    {
        return view('dashboard', [
            'title' => 'Dashboard'
        ]);
    }
}
