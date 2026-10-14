<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | SHOW LOGIN
    |--------------------------------------------------------------------------
    */

    public function showLogin()
    {
        // If already logged in, go directly to the correct dashboard.
        if (Auth::check()) {
            return $this->redirectByRole();
        }

        return $this->noCache(
            response()->view('auth.login')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | LOGIN
    |--------------------------------------------------------------------------
    */

    public function login(Request $request)
    {
        $request->validate([
            'email' => [
                'required',
                'email',
            ],

            'password' => [
                'required',
            ],
        ]);


        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];


        if (!Auth::attempt($credentials)) {
            return back()
                ->withInput($request->only('email'))
                ->with(
                    'error',
                    'Invalid email or password.'
                );
        }


        // Regenerate session after successful login.
        $request->session()->regenerate();


        $user = Auth::user();


        /*
        |--------------------------------------------------------------------------
        | LOGIN EMAIL NOTIFICATION
        |--------------------------------------------------------------------------
        |
        | Sends a test/login notification email.
        | Wrapped in try/catch so an email problem will NOT break login.
        |
        */

        try {
            Mail::to($user->email)
                ->send(
                    new TestMail($user)
                );
        } catch (\Throwable $e) {
            // Do not stop the login process if email sending fails.
        }


        return $this->redirectByRole();
    }


    /*
    |--------------------------------------------------------------------------
    | SHOW REGISTER
    |--------------------------------------------------------------------------
    */

    public function showRegister()
    {
        // Do not allow already logged-in users to open register page.
        if (Auth::check()) {
            return $this->redirectByRole();
        }

        return $this->noCache(
            response()->view('auth.register')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | REGISTER
    |--------------------------------------------------------------------------
    */

    public function register(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users,email',
            ],

            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | IMPORTANT
        |--------------------------------------------------------------------------
        |
        | New registrations are ALWAYS customers.
        | Users cannot choose Admin or Staff from registration.
        |
        */

        $user = User::create([
            'name' => $request->name,

            'email' => $request->email,

            'password' => Hash::make(
                $request->password
            ),

            'role' => 'customer',
        ]);


        /*
        |--------------------------------------------------------------------------
        | AUTO LOGIN AFTER REGISTER
        |--------------------------------------------------------------------------
        */

        Auth::login($user);


        $request->session()->regenerate();


        /*
        |--------------------------------------------------------------------------
        | REGISTRATION EMAIL
        |--------------------------------------------------------------------------
        |
        | Sends notification email.
        | Email failure will not stop registration/login.
        |
        */

        try {
            Mail::to($user->email)
                ->send(
                    new TestMail($user)
                );
        } catch (\Throwable $e) {
            // Ignore email error so registration still succeeds.
        }


        return $this->redirectByRole();
    }


    /*
    |--------------------------------------------------------------------------
    | LOGOUT
    |--------------------------------------------------------------------------
    */

    public function logout(Request $request)
    {
        Auth::logout();


        /*
        |--------------------------------------------------------------------------
        | INVALIDATE CURRENT SESSION
        |--------------------------------------------------------------------------
        */

        $request->session()->invalidate();


        /*
        |--------------------------------------------------------------------------
        | REGENERATE CSRF TOKEN
        |--------------------------------------------------------------------------
        */

        $request->session()->regenerateToken();


        /*
        |--------------------------------------------------------------------------
        | REDIRECT TO LOGIN
        |--------------------------------------------------------------------------
        */

        return $this->noCache(
            redirect()
                ->route('login')
                ->with(
                    'success',
                    'You have been logged out successfully.'
                )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | REDIRECT USER BY ROLE
    |--------------------------------------------------------------------------
    */

    private function redirectByRole()
    {
        /*
        |--------------------------------------------------------------------------
        | SAFETY CHECK
        |--------------------------------------------------------------------------
        */

        if (!Auth::check()) {
            return $this->noCache(
                redirect()->route('login')
            );
        }


        $user = Auth::user();


        /*
        |--------------------------------------------------------------------------
        | CLEAN ROLE VALUE
        |--------------------------------------------------------------------------
        |
        | trim() removes unwanted spaces/new lines from the database.
        |
        */

        $role = strtolower(
            trim(
                $user->role ?? ''
            )
        );


        /*
        |--------------------------------------------------------------------------
        | ADMIN
        |--------------------------------------------------------------------------
        */

        if ($role === 'admin') {
            return $this->noCache(
                redirect()->route(
                    'admin.dashboard'
                )
            );
        }


        /*
        |--------------------------------------------------------------------------
        | STAFF
        |--------------------------------------------------------------------------
        */

        if ($role === 'staff') {
            return $this->noCache(
                redirect()->route(
                    'staff.dashboard'
                )
            );
        }


        /*
        |--------------------------------------------------------------------------
        | CUSTOMER
        |--------------------------------------------------------------------------
        */

        if ($role === 'customer') {
            return $this->noCache(
                redirect()->route(
                    'customer.dashboard'
                )
            );
        }


        /*
        |--------------------------------------------------------------------------
        | UNKNOWN ROLE
        |--------------------------------------------------------------------------
        |
        | Prevent users with invalid roles from entering the system.
        |
        */

        Auth::logout();


        return $this->noCache(
            redirect()
                ->route('login')
                ->with(
                    'error',
                    'Your account role is not recognized.'
                )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | DISABLE BROWSER CACHE
    |--------------------------------------------------------------------------
    |
    | Helps prevent the login page from being shown through browser cache
    | after logout.
    |
    */

    private function noCache($response)
    {
        return $response
            ->header(
                'Cache-Control',
                'no-store, no-cache, must-revalidate, max-age=0'
            )
            ->header(
                'Pragma',
                'no-cache'
            )
            ->header(
                'Expires',
                '0'
            );
    }
}