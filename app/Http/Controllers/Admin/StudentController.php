<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Student;
use Illuminate\Http\Request;

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
            'gambar_proker' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if ($request->photo == null) {
            $photo = $request->photo;
        }else{
            $photo = $request->photo->getClientOriginalName() . '-' . time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('image/avatars'), $photo);
        }

        //cek deskripsi
        if($request->description == null){
            $description = "Tidak ada keterangan";
        }else{
            $description = $request->description;
        }
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
        $student = Student::find($id);
        $departments = Department::all();
        return view('student.crud.create', compact('departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
