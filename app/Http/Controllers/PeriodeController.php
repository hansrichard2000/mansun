<?php

namespace App\Http\Controllers;

use App\Models\Periode;
use App\Models\User;
use Illuminate\Http\Request;

class PeriodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periodes = Periode::all();
        return view('periode.index', compact('periodes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('periode.crud.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'gambar_periode' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if ($request->gambar_periode != null){
            $imgPeriode = $request->gambar_periode->getClientOriginalName().'-'.time().'.'.$request->gambar_periode->extension();
            $request->picture->move(public_path('images/periodeImg'), $imgPeriode);

            Periode::create([
                'tahun_periode' => $request->tahun_periode,
                'gambar_periode' => $imgPeriode,
                'nilai' => $request->nilai,
                'created_by' => $request->created_by,
            ]);
        }
        else{
            Periode::create([
                'tahun_periode' => $request->tahun_periode,
                'nilai' => $request->nilai,
                'created_by' => $request->created_by,
            ]);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Periode  $periode
     * @return \Illuminate\Http\Response
     */
    public function show(Periode $periode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Periode  $periode
     * @return \Illuminate\Http\Response
     */
    public function edit(Periode $periode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Periode  $periode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Periode $periode)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Periode  $periode
     * @return \Illuminate\Http\Response
     */
    public function destroy(Periode $periode)
    {
        //
    }
}
