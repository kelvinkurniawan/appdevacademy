<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskProgress;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        //

        $request->validate([
            'task' => 'required',
            'description' => 'required'
        ]);

        $task = Task::create([
            'task' => $request->task,
            'description' => $request->description,
            'current_status' => 0,
            'updated_at' => Carbon::now(),
            'project_id' => $request->project_id
        ]);

        TaskProgress::create([
            'status' => 0,
            'task_id' => $task->id,
            'user_id' => Auth::id(),
            'updated_at' => Carbon::now()
        ]);

        return redirect()->route('project.show', $request->project_id)->with('success', 'Task added!');
    }

    public function updateTaskStatus(Request $request){

        TaskProgress::create([
            'status' => $request->status,
            'task_id' => $request->task_id,
            'user_id' => Auth::id(),
            'updated_at' => Carbon::now()
        ]);

        $task = Task::find($request->task_id);
        $task->current_status = $request->status;
        $task->save();

        return redirect()->route('project.show', $request->task_id)->with('success', 'Task Updated!');

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

        return Task::where('id', $id)->with('taskProgresses')->first();
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
    public function update(Request $request, Task $task)
    {
        //

        $request->validate([
            'task' => 'required',
            'description' => 'required'
        ]);


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
