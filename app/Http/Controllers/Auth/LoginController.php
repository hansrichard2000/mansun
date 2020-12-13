<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {

        $mahasiswa_admin = [
            'email' => Auth::user()->emailMahasiswa()->where('email', $request->email)->first(),
            'password' => $request->password,
            'dosen_id' => null,
            'is_login' => '0',
            'is_active' => '1',
            'is_admin' => '1',
        ];

        $dosen_admin = [
            'email' => Auth::user()->emailDosen()->where('email', $request->email)->first(),
            'password' => $request->password,
            'mahasiswa_id' => null,
            'is_login' => '0',
            'is_active' => '1',
            'is_admin' => '1',
        ];

        $mahasiswa_not_admin = [
            'email' => Auth::user()->emailMahasiswa()->where('email', $request->email)->first(),
            'password' => $request->password,
            'dosen_id' => null,
            'is_login' => '0',
            'is_active' => '1',
            'is_admin' => '0',
        ];

        $dosen_not_admin = [
            'email' => Auth::user()->emailDosen()->where('email', $request->email)->first(),
            'password' => $request->password,
            'mahasiswa_id' => null,
            'is_login' => '0',
            'is_active' => '1',
            'is_admin' => '0',
        ];

        if (Auth::attempt($mahasiswa_admin)) {
            $this->isLogin(Auth::id());
            return redirect()->route('periode.index');
        }else if (Auth::attempt($dosen_admin)) {
            $this->isLogin(Auth::id());
            return redirect()->route('periode.index');
        }else if (Auth::attempt($mahasiswa_not_admin)) {
            $this->isLogin(Auth::id());
            return redirect()->route('periode.index');
        }else if (Auth::attempt($mahasiswa_not_admin)) {
            $this->isLogin(Auth::id());
            return redirect()->route('periode.index');
        }

        return redirect()->route('login');
    }

    public function logout(Request $request)
    {
        $user = User::findOrFail(Auth::id());
        $user->update([
            'is_login' => '0',
        ]);

        $request->session()->invalidate();
        return $this->loggedOut($request) ?: redirect('login');
    }

    private function isLogin(int $id)
    {
        $user = User::findOrFail($id);
        return $user->update([
            'is_login' => '1',
        ]);
    }
}
