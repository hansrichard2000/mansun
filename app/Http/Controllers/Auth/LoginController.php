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
        $this->middleware('admin')->except('logout');
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

            $mahasiswa_not_admin = [
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
            else if (Auth::attempt($mahasiswa_not_admin)) {

                $this->isLogin(Auth::id());
                return redirect()->route('periode.index');
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

            $dosen_not_admin = [
                'lecturer_id' => $dosen->lecturer_id,
                'password' => $request->password,
                'student_id' => null,
                'is_login' => '0',
                'is_active' => '1',
                'is_admin' => '0',
            ];

            if (Auth::attempt($dosen_admin)) {
                    $this->isLogin(Auth::id());
                    return redirect()->route('admin.periode.index');
            } else if (Auth::attempt($dosen_not_admin)) {
                $this->isLogin(Auth::id());
                return redirect()->route('periode.index');
            }

        }


        return redirect()->route('login')->with('Login Failed', 'Account in use or suspended');
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
