@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        {{-- task create button --}}
        <div class="form-group">
            <a href="{{ route('tasks.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add Task</a>
        </div>

        {{-- list --}}
        <div class="col-md-12 m-2 p-2">
            @if($tasks->isEmpty())
            <p>No tasks found.</p>
            @else
            <table class="table table-responsive table-hover table-bordered">
                <thead>
                    <tr>
                        <td>SL.</td>
                        <td>Task Name</td>
                        <td>Start Date</td>
                        <td>End Date</td>
                        <td>Status</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                    <tr>
                        <td>{{ $task->id }}</td>
                        <td>{{ $task->task_name }}</td>
                        <td>{{ $task->start_date }}</td>
                        <td>{{ $task->end_date }}</td>
                        <td>
                            @if($task->status == 0)
                            Pending
                            @elseif($task->status == 1)
                            In Progress
                            @elseif($task->status == 2)
                            Completed
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary btn-sm" style="border-radius: 50%;"><i class="fa fa-edit"></i></a>

                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline; border-radius: 50%;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            @endif
        </div>
    </div>
</div>
@endsection
