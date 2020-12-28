<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Divisi;
use App\Models\DivisiRoleUser;
use App\Models\Proker;
use App\Models\Status_Task;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProkerController extends Controller
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
        //1. ngambil di divisi mana saja user terdaftar sebagai panitia
        $dvs = DivisiRoleUser::all()->where('mansun_user_id',Auth::user()->id)->pluck('mansun_divisi_id')->toArray();

        //ngambil model divisi yang user terdaftar dar step 1i
        $divisis = Divisi::all()->where('proker_id', $id)->whereIn('id', $dvs);

        //ngecek nama divisinya
        $name = $divisis->pluck('nama_divisi')->first();

        //kalau divisi HOD, bisa liat divisi lainn juga
        //strtolower untuk memastikan gak ada typo jadi di lowercase
        if (strtolower($name) == "hod"){
            $divisis = Divisi::all()->where('proker_id', $id);
        }

        $prokers = Proker::find($id);

        $tasks = Task::all();

        $users = User::all();
        $status_tasks = Status_Task::all();
        return view('divisi.index', compact('divisis', 'users', 'id', 'tasks', 'status_tasks', 'prokers'));
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
