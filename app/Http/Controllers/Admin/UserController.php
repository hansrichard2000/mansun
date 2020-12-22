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
        $students = DB::select('select * from students s inner join mansun_users u on u.student_id = s.student_id');
        $lecturers = DB::select('SELECT * FROM lecturers l INNER JOIN mansun_users u ON u.lecturer_id = l.lecturer_id');

//        $users1 = User::all()->where('lecturer_id', null);
////        dd($users1);
//
//        $students = Student::whereIn('lecturer_id', $users1);
////        dd($students);
//
//        $lecturers = Lecturer::all();
        $users = User::all();

        return view('user.index',compact('users', 'students', 'lecturers'));
//        return $users->student->name;
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
//        $students = Student::whereNotIn('student_id', function ($query){
//            $query->select('student_id')->from('mansun_users');
//        })->get();
//
//        dd($students);
//        $lecturers = Lecturer::whereNotIn('lecturer_id', function ($query){
//            $query->select('lecturer_id')->from('mansun_users')->where('lecturer_id', !null);
//        })->get();
//        $students = DB::select('SELECT * FROM students where student_id NOT IN(SELECT student_id FROM mansun_users WHERE student_id IS NOT NULL)');
        $students = Student::all();

        dd($students);
//        $dosens = DB::select('SELECT * FROM lecturers where lecturer_id NOT IN(SELECT lecturer_id FROM mansun_users WHERE lecturer_id IS NOT NULL)');
//        $dosens = Lecturer::all();

        return view('user.crud.create', compact('students', 'lecturers'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->student_id != null){

            //pluck email from database
            $email = Student::all()->where('student_id',$request->student_id)->pluck('email')->toArray();

            User::create([
                'student_id' => $request->student_id,
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
            $email = Lecturer::all()->where('lecturer_id',$request->lecturer_id)->pluck('email')->toArray();

            User::create([
                'student_id' => null,
                'lecturer_id' => $request->lecturer_id,
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
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
//        dd($request->type);
//        $user = User::where('student_id', $user->student_id)->first();
        $user->delete();
        return redirect()->route('admin.user.index');
    }
}
