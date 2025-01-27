<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskAPIController extends Controller
{
    public function index(Request $request)
    {
        $task = Task::query();
        if ($request->has('done')) {
            $task->where('completed', $request->done);
        }
        if ($request->has('category')) {
            $task->where('category_id', $request->category);
        }
        $todos = $task->get();
        $message = 'Tasks retrieved successfully';

        if ($request->has('done')) {
            $message = $request->done == '1' ? 'Completed tasks' : 'Uncompleted tasks';
        }
        return response()->json([
            'message'=>$message,
            'success'=>true,
            'data'=>$todos
        ]);
    }
    public function find (int $id)
    {
        $task = Task::find($id);

        if ($task)
        {
            return response()->json([
                'message' => 'Task retrieved successfully.',
                'success' => true,
                'data' => $task
            ]);
        }
        else
        {
            return response()->json([
                'message' => 'Task not found.',
                'success' => false,
            ], 404);
        }
    }
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'completed' => 'required|boolean',
            'category_id'=> 'required|integer'
        ]);

        $task = new Task();
        $task->name = $request->input('name');
        $task->completed = $request->input('completed');

        $task->save();
        return response()->json([
            'message' => 'Task created successfully.',
            'success' => true,
        ],201);
    }
    public function delete(int $id)
    {
        $task = Task::find($id);
        $task->delete();
        return response()->json([
            'message' => 'Task deleted successfully.',
            'success' => true,
        ]);
    }
    public function update (Request $request, int $id)
    {
        $task = Task::find($id);
        $task->name = $request->name;
        $task->completed = $request->completed;
        $task->category_id = $request->category_id;

        $task->save();

        return response()->json([
            'message' => 'Task updated successfully.',
            'success' => true,
            'data' => $task
        ]);
    }
}
