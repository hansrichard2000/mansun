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
        $member = Divisi::findOrFail($id);
        $members = DivisiRoleUser::all()->where('mansun_divisi_id', $id);
//        dd($members);
        $roles = Role::all();
        $prokers = Proker::all()->except($id)->pluck('id');
        $divisis = Divisi::all()->except($id)->pluck('id');
        $userList = User::whereNotIn('id', function ($query) use($divisis){
            $query->select('mansun_user_id')->from('divisi_role_user')
                ->whereNotIn('mansun_divisi_id', $divisis);
        })->where('is_admin', 1)->get();

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
