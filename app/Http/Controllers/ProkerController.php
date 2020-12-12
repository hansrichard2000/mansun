<?php

namespace App\Http\Controllers;

use App\Models\Periode;
use App\Models\Proker;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;

class ProkerController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param  int  $periode
     * @return \Illuminate\Http\Response
     */
    public function index(Periode $periode)
    {
//        $periode->id = 1;
//        dd($periode);
//        $prokers = Proker::all();

        $prokers = Proker::all()->where('periode_id', '==',$periode->id);

        return view('proker.index', compact('prokers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proker.crud.create');
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
     * @param  \App\Models\Proker  $proker
     * @return \Illuminate\Http\Response
     */
    public function show(Proker $proker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proker  $proker
     * @return \Illuminate\Http\Response
     */
    public function edit(Proker $proker)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proker  $proker
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proker $proker)
    {
        $proker->update($request->all());
        return redirect()->route('proker.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proker  $proker
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proker $proker)
    {
        $proker->delete();
        return redirect()->route('proker.index');
    }
}
