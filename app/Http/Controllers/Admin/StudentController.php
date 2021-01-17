<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return view('student.index', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $students_temp = DB::select("SELECT * FROM students s WHERE UPPER(s.`name`) LIKE UPPER('%".$request->keyword."%');");
        $students = Student::hydrate($students_temp);
        //hydrate buat casting hasil query ke dalam bentuk model
        return view('student.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        return view('student.crud.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //cek photo
        $request->validate([
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        if ($request->photo != null) {
            $photo = $request->photo->getClientOriginalName() . '-' . time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('image/profile'), $photo);

            Student::create([
                'nim' => $request->nim,
                'name' => $request->name,
                'gender' => $request->gender,
                'email' => $request->email,
                'phone' => $request->phone,
                'line_account' => $request->line_account,
                'batch' => $request->batch,
                'description' => $request->description,
                'photo' => $photo,
                'department_id' => $request->department_id,
            ]);

        }else{

            Student::create([
                'nim' => $request->nim,
                'name' => $request->name,
                'gender' => $request->gender,
                'email' => $request->email,
                'phone' => $request->phone,
                'line_account' => $request->line_account,
                'batch' => $request->batch,
                'description' => $request->description,
                'department_id' => $request->department_id,
                ]);
        }

            return redirect()->route('admin.student.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::Where('student_id', $id)->first();
        $departments = Department::all();
        return view('student.crud.edit', compact('departments', 'student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = Student::all()->where('student_id', $id)->first();
//        dd($);
        $request->validate([
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if ($request->photo != null) {
            $photo = $request->photo->getClientOriginalName() . '-' . time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('image/profile'), $photo);

            $student->update([
                'nim' => $request->nim,
                'name' => $request->name,
                'gender' => $request->gender,
                'email' => $request->email,
                'phone' => $request->phone,
                'line_account' => $request->line_account,
                'batch' => $request->batch,
                'description' => $request->description,
                'photo' => $photo,
                'department_id' => $request->department_id,
            ]);

        }else{

            $student->update([
                'nim' => $request->nim,
                'name' => $request->name,
                'gender' => $request->gender,
                'email' => $request->email,
                'phone' => $request->phone,
                'line_account' => $request->line_account,
                'batch' => $request->batch,
                'description' => $request->description,
                'department_id' => $request->department_id,
            ]);
        }
        return redirect()->route('admin.student.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::all()->where('student_id', $id)->first();
        $student->delete();
        return redirect()->route('admin.student.index');
    }
}
