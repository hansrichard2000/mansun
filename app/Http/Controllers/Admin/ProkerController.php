<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Divisi;
use App\Models\Periode;
use App\Models\Proker;
use App\Models\Status_Proker;
use App\Models\Status_Task;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;

class ProkerController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Periode $id)
    {

        $prokers = Proker::all()->where('periode_id', $id);
        $periodes = Periode::all()->where('id', $id);
        return view('proker.index', compact('prokers', 'periodes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Periode $id)
    {
//        $periodes = Periode::all()->where('id', $id);

        //sementara
        $periodes = Periode::all();
//
//        dd($periodes);
        $status_prokers = Status_Proker::all();
        $users = User::all();
        return view('proker.crud.create', compact('periodes', 'status_prokers', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request);
        $request->validate([
            'gambar_proker' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if ($request->gambar_proker != null){
            $imgProker = $request->gambar_proker->getClientOriginalName().'-'.time().'.'.$request->gambar_proker->extension();
            $request->gambar_proker->move(public_path('image/prokerImg'), $imgProker);

            Proker::create([
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
            Proker::create([
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
        return redirect()->route('admin.periode.show', $request->periode_id);
    }

    /**
     * Display the specified resource.
     * @param  int  $id
     * @param  \App\Models\Divisi  $divisis
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $divisis = Divisi::all()->where('proker_id', $id);
//        dd($divisis);
        $prokers = Proker::find($id);
//        dd($prokers);
        $tasks = Task::all();
//        dd($tasks);
        $users = User::all();
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
        //
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
        $proker->update($request->all());
        return redirect()->route('admin.proker.index');
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
        return redirect()->route('admin.proker.index');
    }
}
