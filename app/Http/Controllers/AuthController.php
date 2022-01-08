<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller {

    public function formLogin(Request $request) {
        if (Auth::check()) {
            return redirect()->route('landing');
        } else {
            $email = $request->cookie('email');
            return view('auth.login', compact('email'));
        }
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        $data = $request->only(['email', 'password']);
        $remember = $request->has('remember');

        Auth::attempt($data, $remember);

        if (Auth::check()) {
            $user = Auth::user();
            if ($remember) {
                $cookie = cookie('email', $user->email, 2629440);
                return redirect()->route('landing')->withCookie($cookie);
            } else {
                return redirect()->route('landing');
            }
        } else {
            return redirect()->route('login')->with('error', 'Email or password is wrong')->withInput();
        }
    }

    public function formRegister() {
        if (Auth::check()) {
            return redirect()->route('landing');
        } else {
            return view('auth.register');
        }
    }

    public function register(Request $request) {
        $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|email|unique:users',
            'password'  => 'required|string|min:8',
            'address'   => 'required|string|min:15',
            'phone'     => 'required|numeric|digits_between:11,13',
        ]);
        
        User::create([
            'name'      => $request->input('name'),
            'role'      => 'member',
            'email'     => $request->input('email'),
            'password'  => Hash::make($request->input('password')),
            'address'   => $request->input('address'),
            'phone'     => $request->input('phone'),
        ]);
        
        Session::flash('success', 'Congratulations ' . $request->input('name') . ' successfully registering at Toko Kembang! Please login using that account.');
        return redirect()->route('login');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('landing');
    }

    public function profile() {
        $user = Auth::user();
        return view('auth.profile', compact('user'));
    }

    public function editProfile() {
        $user = Auth::user();
        return view('auth.edit-profile', compact('user'));
    }

    public function update(Request $request) {
        if ($request->has('cancel')) {
            return redirect()->route('profile.index');
        } else {
            $request->validate([
                'name'      => 'required|string|max:255',
                'password'  => 'required|string|min:8',
                'confirm'   => 'required|string|min:8',
                'address'   => 'required|string|min:15',
                'phone'     => 'required|numeric|digits_between:11,13',
            ]);

            $user = Auth::user();

            if (Hash::check($request->input('confirm'), $user->password)) {
                User::where('id', Auth::user()->id)
                    ->update([
                        'name'      => $request->input('name'),
                        'password'  => Hash::make($request->input('password')),
                        'address'   => $request->input('address'),
                        'phone'     => $request->input('phone'),
                    ]);

                Session::flash('success', 'Profile updated successfully');
                return redirect()->route('profile.index');
            } else {
                return redirect()->route('profile.edit')->with('error', 'Confirm password is does not match with our records')->withInput();
            }
        }
    }
}
