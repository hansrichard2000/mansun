<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Lecturer;
use App\Models\Student;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;
use Symfony\Component\Console\Input\Input;
use function PHPUnit\Framework\isEmpty;

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

        $mahasiswa = Student::all()->where('email', $request->email)->first();
        $dosen = Lecturer::all()->where('email', $request->email)->first();

        if(!empty($mahasiswa)){
            $mahasiswa_admin = [
                'student_id' => $mahasiswa->student_id,
                'password' => $request->password,
                'lecturer_id' => null,
                'is_login' => '0',
                'is_active' => '1',
                'is_admin' => '1',
            ];

            $user = [
                'student_id' => $mahasiswa->student_id,
                'password' => $request->password,
                'lecturer_id' => null,
                'is_login' => '0',
                'is_active' => '1',
                'is_admin' => '0',
            ];

            if (Auth::attempt($mahasiswa_admin)) {
                $this->isLogin(Auth::id());
                return redirect()->route('admin.periode.index');
            }
            else if (Auth::attempt($user)) {

                $this->isLogin(Auth::id());
                return redirect()->route('user.periode.index');
            }else{
                $errors = new MessageBag([
                    'password' => ['password Anda salah atau akun diblokir'],
                ]);
                return redirect()->route('login')->withErrors($errors);
            }

        }
        else if (!empty($dosen)){

            $dosen_admin = [
                'lecturer_id' => $dosen->lecturer_id,
                'password' => $request->password,
                'student_id' => null,
                'is_login' => '0',
                'is_active' => '1',
                'is_admin' => '1',
            ];

            if (Auth::attempt($dosen_admin)) {
                    $this->isLogin(Auth::id());
                    return redirect()->route('admin.periode.index');
            }

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
