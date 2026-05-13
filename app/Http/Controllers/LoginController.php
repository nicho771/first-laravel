<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Exception;

class LoginController extends Controller
{
    public function view()
    {
        return view('formlogin');
    }

    public function login(Request $request)
    {
        //Validasi Input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // //cek kredensial
        // if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        //     return redirect()->intended('/berita');
        // }

        // Cek kredensial baru untuk materi ROLE 
        $credentials = $request->only('email', 'password');

        $user = User::where('email', $credentials['email'])->first();

        // Membuat logika Login Roles
        if ($user && Hash::check($credentials['password'], $user->password)) {
            Auth::login($user);

            if ($user->role === 'superadmin') {
                return redirect('/superadmin');
            } elseif ($user->role === 'penulis') {
                return redirect('/penulis');
            }
        }

        return back()->withErrors(['email' => 'Email atau password anda salah']);
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Logout User

        $request->session()->invalidate(); //Hapus sesi
        $request->session()->regenerateToken(); //Regenerasi CSRF Token

        return redirect('/');
    }

    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback() 
    {
        try {
            $user = Socialite::driver('google')->user();

            $finduser = User::where('gauth_id', $user->id)->first();

            if($finduser) {

                Auth::login($finduser);

                return redirect('/setelahlogin');

            }else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'gauth_id' => $user->id,
                    'gauth_type' => 'google',
                    'password' => Hash::make('admin123'),
                ]);

                Auth::login($newUser);

                return redirect ('/setelahlogin');
            }
            
        } catch (\Exception $e) {
            dd($e);
        }
    }
}
