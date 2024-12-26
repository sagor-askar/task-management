<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Task;
use Validator;
use App\Http\Resources\TaskResource;

class TaskController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::where('user_id', auth()->id())->get();
        return $this->sendResponse(TaskResource::collection($tasks), 'Task Info Displayed Successfully!');
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
        $input = $request->all();

        $validator = Validator::make($input, [
            'task_name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        $input['user_id'] = auth()->id();
        $input['status'] = 0;

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $tasks = Task::create($input);
        return $this->sendResponse(new TaskResource($tasks), 'Task Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tasks = Task::find($id);

        if (is_null($tasks)) {
            return $this->sendError('Task not found.');
        }

        return $this->sendResponse(new TaskResource($tasks), 'Task Retrieved Successfully!');
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

        $tasks = Task::findOrFail($id);

        // Ensure the task belongs to the authenticated user
        if ($tasks->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $validated = $request->validate([
            'task_name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'status' => 'required|in:0,1,2',
        ]);

        $tasks->update($validated);

        return $this->sendResponse(new TaskResource($tasks), 'Task Updated Successfully.');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tasks = Task::findOrFail($id);
        $tasks->delete();
        return $this->sendResponse([], 'Task Deleted Successfully.');
    }
}
