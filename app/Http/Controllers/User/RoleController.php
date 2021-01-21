<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Divisi;
use App\Models\DivisiRoleUser;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $user = User::findOrFail($request->mansun_user_id);

        DivisiRoleUser::create($request->all());
        return redirect()->route('user.divisi.show', $request->mansun_divisi_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
     * @param  \App\Models\Task $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        if ($request->link_hasil_kerja == null){
            $task->update([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'deadline' => $request->deadline,
                'link_hasil_kerja' => $request->link_hasil_kerja,
                'penanggung_jawab' => $request->penanggung_jawab,
                'divisi_id' => $request->divisi_id,
                'status_task_id' => '1',
                'created_by' => $request->created_by,
            ]);
        }else{
            $task->update([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'deadline' => $request->deadline,
                'link_hasil_kerja' => $request->link_hasil_kerja,
                'penanggung_jawab' => $request->penanggung_jawab,
                'divisi_id' => $request->divisi_id,
                'status_task_id' => '2',
                'created_by' => $request->created_by,
            ]);
        }
        return redirect()->route('user.proker.show', Divisi::find($request->divisi_id)->proker_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dvs = DivisiRoleUser::where('id', $id);

        $dvs->delete();
        return redirect()->back();
    }
}
