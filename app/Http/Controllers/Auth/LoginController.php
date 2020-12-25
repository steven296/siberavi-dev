<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\User;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = "/";

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest')->except('logout');
        $this->middleware('guest')->only('showLoginForm');
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'user';
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login( LoginRequest $request ) {

        $password = DB::select('SELECT PASSWORD(?) AS password', [$request->password])[0]->password;
        
        if (Auth::attempt(['User' => $request->user, 'Password' => $password])) {
            
            auth()->user()->pass = $request->password;
            $request->session()->put('user', auth()->user());
            
        	return redirect()->route('home');

         } else {
            return back()
            ->withErrors([$this->username() => 'Usuario o contraseña incorrecta'])
            ->withInput(request([$this->username()]));
        }
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->flush();

        return redirect('/login');
    }
}
