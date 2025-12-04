<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Client;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::paginate(10);

        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $users = User::select(['id', 'name'])->get();
        $clients = Client::select(['id', 'company_name'])->get();
        $projects = Project::select(['id', 'title'])->get();

        return view('tasks.create', compact('users', 'clients', 'projects'));
    }

    public function store(StoreTaskRequest $request)
    {
        Task::create($request->validated());

        return to_route('tasks.index')->with('success', 'Task created succesfully!');
    }

    public function show(Task $task)
    {
        //
    }

    public function edit(Task $task)
    {
        $users = User::select(['id', 'name'])->get();
        $clients = Client::select(['id', 'company_name'])->get();

        return view('tasks.edit', compact('task', 'users', 'clients'));
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        $task->update($request->validated());

        return to_route('tasks.index')->with('success', 'Task updated succesfully!');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return to_route('tasks.index')->with('success', 'Project deleted succesfully!');
    }
}
