<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Divisi;
use App\Models\DivisiRoleUser;
use App\Models\Status_Task;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
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
        if ($request->link_hasil_kerja == null){
            Task::create([
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
            Task::create([
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$id berisi id divisi yg dipencet

        //ngambil semua user yang merupakan anggota divisi tersebut
        $anggota = DivisiRoleUser::all()->where('mansun_divisi_id', $id)->pluck('mansun_user_id')->toArray();

        $users = User::all()->whereIn('id', $anggota);
        $divisis = Divisi::find($id);
//        dd($divisis);
        $status_tasks = Status_Task::all();
        return view('task.create', compact('users', 'status_tasks', 'divisis'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::all();
//        $divisis = Divisi::find($id);
        $task = Task::find($id);
        $status_tasks = Status_Task::all();
        return view('task.edit', compact('users', 'status_tasks', 'task'));
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
                'link_hasil_kerja' => $request->link_hasil_kerja,
                'divisi_id' => $request->divisi_id,
                'status_task_id' => '1',
            ]);
        }else{
            $task->update([
                'link_hasil_kerja' => $request->link_hasil_kerja,
                'divisi_id' => $request->divisi_id,
                'status_task_id' => '2',
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
        //
    }
}
