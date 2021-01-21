<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Admin\PeriodeResource;
use App\Http\Resources\Api\Admin\ProkerResource;
use App\Models\Divisi;
use App\Models\DivisiRoleUser;
use App\Models\Periode;
use App\Models\Proker;
use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;

class PeriodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        if(Auth::user()->isAdmin()){
            $periodes = Periode::all();
            return PeriodeResource::collection($periodes);
        }
        elseif (Auth::user()->isUser()){
            //1. ngambil di divisi mana saja user terdaftar sebagai panitia
            $dvs = DivisiRoleUser::all()->where('mansun_user_id',Auth::user()->id)->pluck('mansun_divisi_id')->toArray();

            //1.5 ngambil semua proker id di tabel divisi berdasarakn step 1
            $divisis = Divisi::all()->whereIn('id', $dvs)->pluck('proker_id')->toArray();

            //2. ambil secara distinct semua id proker yg user itu terdaftar
            $prokers = Proker::distinct()->whereIn('id', $divisis)->pluck('periode_id')->toArray();

            //3. select distinct periode id berdasarkan array dari step 2
            $periodes = Periode::all()->whereIn('id', $prokers);

            return PeriodeResource::collection($periodes);
        }
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
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function show($id)
    {
        if(Auth::user()->isAdmin()){
            $prokers = Proker::all()->where('periode_id', $id);
            $periodes = Periode::all()->where('id', $id);
            return ProkerResource::collection($prokers);
        }
        elseif(Auth::user()->isUser()){
            //1. ngambil di divisi mana saja user terdaftar sebagai panitia
            $dvs = DivisiRoleUser::all()->where('mansun_user_id',Auth::user()->id)->pluck('mansun_divisi_id')->toArray();

            //1.5 ngambil semua proker id di tabel divisi berdasarakn step 1
            $divisis = Divisi::all()->whereIn('id', $dvs)->pluck('proker_id')->toArray();

            //2. ambil semua proker yg user itu terdaftar
            $prokers = Proker::all()->where('periode_id', $id)->whereIn('id', $divisis);

            $periodes = Periode::all()->where('id', $id);
            return ProkerResource::collection($prokers);
        }

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
