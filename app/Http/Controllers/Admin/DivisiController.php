<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Divisi;
use App\Models\DivisiRoleUser;
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
        return view('divisi.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Divisi::create($request->all());
        return redirect()->route('admin.proker.show', $request->proker_id);
    }

    /**
     * Display the specified resource.
     * @param  int  $id
     * @param  \App\Models\User $users
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $members = Divisi::findOrFail($id);
        $roles = Role::all();
        $divisis = Divisi::all()->except($id)->pluck('id');
        $userList = User::whereNotIn('id', function ($query) use($divisis){
            $query->select('mansun_user_id')->from('divisi_role_user')
                ->whereNotIn('mansun_divisi_id', $divisis);
        })->where('is_admin', 0)->get();
        return view('divisi.crud.listAnggota', compact('members','userList', 'roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function edit(Divisi $divisi)
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Divisi $divisi)
    {
        //
    }
}
