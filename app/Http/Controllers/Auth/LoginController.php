<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    /**
     * Show the login form.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Handle the login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // Validate the request data
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        $user = User::where('email',$request->email)->first();
        if($user->status == '1'){
            $superAdmin = config('constants.roles.superAdmin');
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => $superAdmin], $request->remember)) {
                return redirect()->intended('dashboard')->with('success', 'You have successfully logged in');
            }
        }else{
            return back()->withErrors([
                'email' => 'User not permission.',
            ])->withInput($request->only('email', 'remember'));
        }

        return back()->withErrors([
            'email' => 'Credentials do not match our records.',
        ])->withInput($request->only('email', 'remember'));
    }

    /**
     * Log the user out.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::logout();

        return redirect('/')->with('success', 'You have successfully logged out');
    }
}
