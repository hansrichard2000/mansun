<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Divisi;
use App\Models\DivisiRoleUser;
use App\Models\Proker;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class DivisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //$id berisi id divisi yang di pencet dalam tabel mansun_divisis

        //return object model Divisi yang dipencet user
        $member = Divisi::findOrFail($id);

        //return object model many to many dari user yang terdaftar pada divisi yang dipencet user
        $members = DivisiRoleUser::all()->where('mansun_divisi_id', $id);

        //return semua jenis role
        $roles = Role::all();


        //1. cara ngambil id proker yang dipencet user
//        $member->proker_id

        //2. ngambil semua divisi dengan proker id sekian
        $divisis = Divisi::all()->where('proker_id', $member->proker_id)->pluck('id')->toArray();

        //3. ngambil semua user di many to many yang divisi_idnya ada dalam step ke 2
        $dvs = DivisiRoleUser::all()->whereIn('mansun_divisi_id', $divisis)->pluck('mansun_user_id')->toArray();

        //4. ngambil semua user di table user yang tidak ada dalam query step ke tiga
        $userList = User::all()->whereNotIn('id', $dvs)->where('is_admin', '0');

        //OMAIGADDD!!!!

        return view('divisi.crud.listAnggota', compact('members','userList', 'roles', 'member'));
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
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Divisi $divisi)
    {
        $divisi->update($request->all());
        return redirect()->route('user.proker.show', $request->proker_id);
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
