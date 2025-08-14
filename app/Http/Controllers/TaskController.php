<?php

namespace App\Http\Controllers;

use App\Enums\TasksStatusEnum;
use App\Models\Task;
use App\Services\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();

        return ApiResponse::success($tasks);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => ['required', 'min:3', 'string'],
                'description' => ['nullable', 'min:5', 'string'],
            ]
        );

        $task = DB::transaction(function () use ($request) {
            $task = Task::create([
                'owner_id' => 1,
                'title' => $request->title,
                'description' => $request->description,
                'status' => TasksStatusEnum::pending,
            ]);

            return $task;
        });

        return ApiResponse::success(['task' => $task]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
    }
}
