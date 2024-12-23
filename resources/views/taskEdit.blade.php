@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card m-4 p-4">
        <h3>Edit Task</h3>
        <form action="{{ route('tasks.update', $tasks->id) }}" method="POST" class="row g-3">
            @csrf
            @method('PUT')

            <!-- Task Name -->
            <div class="col-md-6">
                <label for="task_name" class="form-label">Task Name</label>
                <input type="text" name="task_name" id="task_name" class="form-control" value="{{ $tasks->task_name }}" required>
            </div>

            <!-- Start Date -->
            <div class="col-md-6">
                <label for="start_date" class="form-label">Start Date</label>
                <input type="date" name="start_date" id="start_date" class="form-control" value="{{ $tasks->start_date }}" required>
            </div>

            <!-- End Date -->
            <div class="col-md-6">
                <label for="end_date" class="form-label">End Date</label>
                <input type="date" name="end_date" id="end_date" class="form-control" value="{{ $tasks->end_date }}">
            </div>

            <!-- Status -->
            <div class="col-md-6">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="0" {{ $tasks->status == 0 ? 'selected' : '' }}>Pending</option>
                    <option value="1" {{ $tasks->status == 1 ? 'selected' : '' }}>In Progress</option>
                    <option value="2" {{ $tasks->status == 2 ? 'selected' : '' }}>Completed</option>
                </select>
            </div>

            <!-- Submit and Back Buttons -->
            <div class="col-md-12 d-flex justify-content-end">
                <button type="submit" class="btn btn-success me-2">
                    <i class="fa fa-save"></i> Save Changes
                </button>
                <a href="{{ route('tasks.index') }}" class="btn btn-secondary">
                    <i class="fa fa-arrow-left"></i> Back
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
