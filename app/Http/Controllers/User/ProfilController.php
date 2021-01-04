<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\DivisiRoleUser;
use App\Models\Lecturer;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->lecturer_id == null){
            $current_user = Student::all()->where('student_id', Auth::user()->student_id);
        } else{
            $current_user = Lecturer::all()->where('lecturer_id', Auth::user()->lecturer_id);
        }
//        dd($current_user);

        //ngambil roles dari many to many (user_id, divisi_id, role_id)
        $dvs = DivisiRoleUser::all()->where('mansun_user_id', Auth::user()->id);
//        dd($dvs);

        //ngambil role

        //ngambil di divisi mana aja si user terdaftar

        return view('profil.index', compact('current_user', 'dvs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
