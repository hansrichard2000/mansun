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
        Divisi::create($request->all());
        return redirect()->route('user.proker.show', $request->proker_id);
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

        //daftar semua divisi dalam proker itu termasuk yang gak dipencet
        $listDivisis = Divisi::all()->where('proker_id', $member->proker_id)->pluck('id')->toArray();

        //ngambil semua user dalam proker itu
        $anggotas = DivisiRoleUser::all()->whereIn('mansun_divisi_id', $listDivisis);

        return view('divisi.crud.listAnggota', compact('anggotas', 'members', 'member'));
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
