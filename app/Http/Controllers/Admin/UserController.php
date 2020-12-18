<?php

namespace App\Http\Controllers\Admin;

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Lecturer;
//use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswas = DB::select('select * from students s inner join users u on u.student_id = s.student_id');
        $dosens = DB::select('SELECT * FROM lecturers l INNER JOIN users u ON u.lecturer_id = l.lecturer_id');
        return view('user.index',compact('mahasiswas', 'dosens'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getMyUser()
    {

        $current_user = Student::all()->where('student_id', Auth::user()->student_id);
        return view('user.index',compact('mahasiswas', 'dosens', 'current_user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mahasiswas = DB::select('SELECT * FROM students where student_id NOT IN(SELECT student_id FROM users WHERE student_id IS NOT NULL)');
//        $mahasiswas = Student::all();
        $dosens = DB::select('SELECT * FROM lecturers where lecturer_id NOT IN(SELECT lecturer_id FROM users WHERE lecturer_id IS NOT NULL)');
//        $dosens = Lecturer::all();
        return view('user.crud.create', compact('mahasiswas', 'dosens'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->mahasiswa_id != null){

            //pluck email from database
            $email = Student::all()->where('student_id',$request->mahasiswa_id)->pluck('email')->toArray();

            User::create([
                'student_id' => $request->mahasiswa_id,
                'lecturer_id' => null,
                'email' => $email[0],
                'password' => Hash::make($request->password),
                'is_login' => '0',
                'is_active' => $request->is_active,
                'is_admin' => $request->is_admin,
            ]);
        }
        else{

            //pluck email from database
            $email = Lecturer::all()->where('lecturer_id',$request->dosen_id)->pluck('email')->toArray();

            User::create([
                'student_id' => null,
                'lecturer_id' => $request->dosen_id,
                'email' => $email[0],
                'password' => Hash::make($request->password),
                'is_login' => '0',
                'is_active' => $request->is_active,
                'is_admin' => $request->is_admin,
            ]);
        }
        return redirect()->route('admin.user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy($request)
    {
        $user = User::where('student_id', $request)->first();
//        dd($user);
        $user->delete();
        return redirect()->route('admin.user.index');
    }
}
