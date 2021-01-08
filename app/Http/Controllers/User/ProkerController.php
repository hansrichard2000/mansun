<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Divisi;
use App\Models\DivisiRoleUser;
use App\Models\Periode;
use App\Models\Proker;
use App\Models\Status_Proker;
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
        //$id adalah id prokernya

        //1. ngambil di divisi mana saja user terdaftar sebagai panitia
        $dvs = DivisiRoleUser::all()->where('mansun_user_id',Auth::user()->id)->pluck('mansun_divisi_id')->toArray();

        //ngambil model divisi yang user terdaftar dar step 1i
        $divisis = Divisi::all()->where('proker_id', $id)->whereIn('id', $dvs);

        //ngecek nama divisinya
        $name = $divisis->where('proker_id', $id)->pluck('nama_divisi')->first();

        //kalau divisi HOD, bisa liat divisi lainn juga
        //strtolower untuk memastikan gak ada typo jadi di lowercase
        if (strtolower($name) == "hod"){
            $divisis = Divisi::all()->where('proker_id', $id);
        }

        $dvs2 = $divisis->pluck('id')->toArray();

        $prokers = Proker::find($id);

        $tasks = Task::all();

        $users = DivisiRoleUser::all()->whereIn('mansun_divisi_id', $dvs2);
//        dd($divisis);
//        dd($users);
        $status_tasks = Status_Task::all();



        return view('divisi.index', compact('divisis', 'users', 'id', 'tasks', 'status_tasks', 'prokers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proker  $proker
     * @return \Illuminate\Http\Response
     */
    public function edit(Proker $proker)
    {
        $periodes = Periode::all();
        $status_prokers = Status_Proker::all();
        $users = User::all();
        return view('proker.crud.edit', compact('proker', 'periodes', 'users', 'status_prokers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proker $proker
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proker $proker)
    {
        $request->validate([
            'gambar_proker' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if ($request->gambar_proker != null){
            $imgProker = $request->gambar_proker->getClientOriginalName().'-'.time().'.'.$request->gambar_proker->extension();
            $request->gambar_proker->move(public_path('image/prokerImg'), $imgProker);

            $proker->update([
                'nama_proker' => $request->nama_proker,
                'periode_id' => $request->periode_id,
                'status_proker_id' => $request->status_proker_id,
                'deskripsi_proker' => $request->deskripsi_proker,
                'tanggal_mulai' => $request->tanggal_mulai,
                'tanggal_akhir' => $request->tanggal_akhir,
                'pemasukan' => $request->pemasukan,
                'pengeluaran' => $request->pengeluaran,
                'medsos' => $request->medsos,
                'proposal' => $request->proposal,
                'lpj' => $request->lpj,
                'gambar_proker' => $imgProker,
                'created_by' => $request->created_by,
            ]);
        }
        else{
            $proker->update([
                'nama_proker' => $request->nama_proker,
                'periode_id' => $request->periode_id,
                'status_proker_id' => $request->status_proker_id,
                'deskripsi_proker' => $request->deskripsi_proker,
                'tanggal_mulai' => $request->tanggal_mulai,
                'tanggal_akhir' => $request->tanggal_akhir,
                'pemasukan' => $request->pemasukan,
                'pengeluaran' => $request->pengeluaran,
                'medsos' => $request->medsos,
                'proposal' => $request->proposal,
                'lpj' => $request->lpj,
                'created_by' => $request->created_by,
            ]);
        }
        return redirect()->route('user.periode.show', $request->periode_id);
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
