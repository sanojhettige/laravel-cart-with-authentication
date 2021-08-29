<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends BaseController
{
    // index
    public function index() {
        return view('auth.login')->with(array('cart' => $this->cart ?? array()));
    }

    // signup
    public function signup() {
        return view('auth.signup')->with(array('cart' => $this->cart ?? array()));
    }

    // login
    public function doLogin(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $path = $_GET['path'] ?? 'dashboard';
            return redirect()->intended($path)->withSuccess('Login successful.');
        }

        return redirect('login')->withSuccess('Loin failed');
    }

    // register
    public function doSignup(Request $request) {
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'name' => 'required'
        ]);

        $data = $request->all();
        $create = $this->createUser($data);

        if ($create) {
            return redirect()->intended('dashboard')->withSuccess('SignUp Successful');
        }

        return redirect('signup');
    }

    private function createUser($data) {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }

    // signout
    public function signout() {
        Session::flush();
        Auth::logout();

        return redirect('login');
    }
}
