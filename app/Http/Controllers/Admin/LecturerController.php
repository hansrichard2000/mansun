<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Jaka;
use App\Models\Lecturer;
use App\Models\Title;
use Illuminate\Http\Request;

class LecturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lecturers = Lecturer::all();
        return view('lecturer.index', compact('lecturers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        $titles = Title::all();
        $jakas = Jaka::all();
        return view('lecturer.crud.create', compact('departments', 'titles', 'jakas'));
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

            Lecturer::create([
                'nip' => $request->nip,
                'nidn' => $request->nidn,
                'name' => $request->name,
                'gender' => $request->gender,
                'email' => $request->email,
                'phone' => $request->phone,
                'line_account' => $request->line_account,
                'batch' => $request->batch,
                'description' => $request->description,
                'photo' => $photo,
                'department_id' => $request->department_id,
                'title_id' => $request->title_id,
                'jaka_id' => $request->jaka_id,
            ]);

        }else{

            Lecturer::create([
                'nip' => $request->nip,
                'nidn' => $request->nidn,
                'name' => $request->name,
                'gender' => $request->gender,
                'email' => $request->email,
                'phone' => $request->phone,
                'line_account' => $request->line_account,
                'batch' => $request->batch,
                'description' => $request->description,
                'photo' => $photo,
                'department_id' => $request->department_id,
                'title_id' => $request->title_id,
                'jaka_id' => $request->jaka_id,
            ]);

        }

        return redirect()->route('admin.lecturer.index');
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
        $lecturer = Lecturer::Where('lecturer_id', $id)->first();
        $departments = Department::all();
        $titles = Title::all();
        $jakas = Jaka::all();
        return view('lecturer.crud.edit', compact('departments', 'titles', 'jakas', 'lecturer'));
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
        $lecturer = Lecturer::all()->where('lecturer_id', $id)->first();
//        dd($);
        $request->validate([
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if ($request->photo != null) {
            $photo = $request->photo->getClientOriginalName() . '-' . time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('image/profile'), $photo);

            $lecturer->update([
                'nip' => $request->nip,
                'nidn' => $request->nidn,
                'name' => $request->name,
                'gender' => $request->gender,
                'email' => $request->email,
                'phone' => $request->phone,
                'line_account' => $request->line_account,
                'description' => $request->description,
                'photo' => $photo,
                'department_id' => $request->department_id,
                'title_id' => $request->title_id,
                'jaka_id' => $request->jaka_id,
            ]);

        }else{

            $lecturer->update([
                'nip' => $request->nip,
                'nidn' => $request->nidn,
                'name' => $request->name,
                'gender' => $request->gender,
                'email' => $request->email,
                'phone' => $request->phone,
                'line_account' => $request->line_account,
                'description' => $request->description,
                'department_id' => $request->department_id,
                'title_id' => $request->title_id,
                'jaka_id' => $request->jaka_id,
            ]);
        }
        return redirect()->route('admin.lecturer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lecturer = Lecturer::all()->where('lecturer_id', $id)->first();
        $lecturer->delete();
        return redirect()->route('admin.lecturer.index');
    }
}
