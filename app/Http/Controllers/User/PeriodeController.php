<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Divisi;
use App\Models\DivisiRoleUser;
use App\Models\Periode;
use App\Models\Proker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeriodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //1. ngambil di divisi mana saja user terdaftar sebagai panitia
        $dvs = DivisiRoleUser::all()->where('mansun_user_id',Auth::user()->id)->pluck('mansun_divisi_id')->toArray();

        //1.5 ngambil semua proker id di tabel divisi berdasarakn step 1
        $divisis = Divisi::all()->whereIn('id', $dvs)->pluck('proker_id')->toArray();

        //2. ambil secara distinct semua id proker yg user itu terdaftar
        $prokers = Proker::distinct()->whereIn('id', $divisis)->pluck('periode_id')->toArray();

        //3. select distinct periode id berdasarkan array dari step 2
        $periodes = Periode::all()->whereIn('id', $prokers);

        return view('periode.index', compact('periodes'));
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
        //1. ngambil di divisi mana saja user terdaftar sebagai panitia
        $dvs = DivisiRoleUser::all()->where('mansun_user_id',Auth::user()->id)->pluck('mansun_divisi_id')->toArray();

        //1.5 ngambil semua proker id di tabel divisi berdasarakn step 1
        $divisis = Divisi::all()->whereIn('id', $dvs)->pluck('proker_id')->toArray();

        //2. ambil semua proker yg user itu terdaftar
        $prokers = Proker::all()->whereIn('id', $divisis);

        $periodes = Periode::all()->where('id', $id);
        return view('proker.index', compact('prokers','periodes'));
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
