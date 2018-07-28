<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
use App\Http\Requests\TaskRequest;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::orderBy('id');
        return view('tasks.index',['tasks'=>$tasks]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $task_list=[];
        $tasks = Task::all();

            foreach ($tasks as $key => $task) {
                $task_list = Calendar::event(
                    $task->task_name,
                    true,
                    new \DateTime($task->start_date),
                    new \DateTime($task->end_date . ' +1 day')
                );
                $calendar_details = Calendar::addEvent($task_list);
            }
            return view('/tasks.create',compact('calendar_details'))->
            with('messages','Task added successfully');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)
    {
        $data = $request->all();
        Task::create($data);
        return redirect('/tasks')->
        with('messages', 'Task added successfully');
    }
}
