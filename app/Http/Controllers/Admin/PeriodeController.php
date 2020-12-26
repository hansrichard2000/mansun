<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Periode;
use App\Models\Proker;
use App\Models\User;
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
//        dd(Auth::user());
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
        return view('periode.crud.create', compact('users'));
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
            $request->gambar_periode->move(public_path('image/periodeImg'), $imgPeriode);

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
        return redirect()->route('admin.periode.index');

    }

    /**
     * Display the specified resource.
     * @param  int  $id
     * @param  \App\Models\Proker $prokers
     * @return \Illuminate\Http\Response
     */
    public function show(Proker $prokers, $id)
    {
        $prokers = Proker::all()->where('periode_id', $id);
        $periodes = Periode::all()->where('id', $id);
        return view('proker.index', compact('prokers','periodes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Periode  $periode
     * @return \Illuminate\Http\Response
     */
    public function edit(Periode $periode)
    {
        return view('periode.crud.edit', compact('periode'));
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
        $request->validate([
            'gambar_periode' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if ($request->gambar_periode != null){
            $imgPeriode = $request->gambar_periode->getClientOriginalName().'-'.time().'.'.$request->gambar_periode->extension();
            $request->gambar_periode->move(public_path('image/periodeImg'), $imgPeriode);

            $periode->update([
                'tahun_periode' => $request->tahun_periode,
                'gambar_periode' => $imgPeriode,
                'nilai' => $request->nilai,
                'created_by' => $request->created_by,
            ]);
        }
        else{
            $periode->update([
                'tahun_periode' => $request->tahun_periode,
                'nilai' => $request->nilai,
                'created_by' => $request->created_by,
            ]);
        }
        return redirect()->route('admin.periode.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Periode  $periode
     * @return \Illuminate\Http\Response
     */
    public function destroy(Periode $periode)
    {
        $periode->delete();
        return redirect()->route('admin.periode.index');
    }
}
