<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\UserService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginRegisterController extends Controller
{

    public function __construct()
    {
    }

    public function register()
    {
        $params = [];

        return view('register', []);
    }

    public function login()
    {
        Session::forget('2fa');
        Session::forget('user_id');
        $params = [];


        return view('login', []);
    }

    public function authenticate(Request $request)
    {
        $this->checkTooManyFailedAttempts();

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $credentials['email'])->whereNotNull('email_verified_at')->first();

        if (Auth::attempt($request->only('email', 'password'))) {
            // return redirect()
            //     ->route('dashboard')
            //     ->with('Welcome! Your account has been successfully created!');
            $user->generateCode();
            Session::put('user_id', auth()->user()->id);
            return redirect()->route('2fa.index');
        }

        return redirect()
            ->back()->withErrors([
                'email' => 'Invalid credentials!',
            ])
            ->withInput();
    }


    public function verify(Request $request, int $id)
    {
        $curTime = Carbon::now();

        $user = User::where('id', $id)->first();

        if ($user == null) {
            return redirect('/login')->with('status', 'No such user found!');
        }

        $user->email_verified_at = $curTime->toDayDateTimeString();
        $user->save();

        return redirect('/users/login')->withSuccess('Please, login!');
    }

    public function store(Request $request)
    {

        $userService = new UserService();
        $userService->create($request);
        return redirect()->route('login')
            ->withSuccess('You have successfully registered! Please, check your mail for confirmation!');
    }

    public function dashboard()
    {
        if (Auth::check()) {
            return view('auth.dashboard');
        }

        return redirect()->route('login')
            ->withErrors([
                'email' => 'Please login to access the dashboard.',
            ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')
            ->withSuccess('You have logged out successfully!');;
    }
}
