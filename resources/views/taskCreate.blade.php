@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card m-4 p-4">
        <h3>Create New Task</h3>
        <form action="{{ route('tasks.store') }}" method="POST" class="row g-3">
            @csrf

            <!-- Task Name -->
            <div class="col-md-4">
                <label for="task_name" class="form-label">Task Name</label>
                <input type="text" name="task_name" id="task_name" class="form-control" placeholder="Enter Task Name..." required>
            </div>

            <!-- Start Date -->
            <div class="col-md-4">
                <label for="start_date" class="form-label">Start Date</label>
                <input type="date" name="start_date" id="start_date" class="form-control" required>
            </div>

            <!-- End Date -->
            <div class="col-md-4">
                <label for="end_date" class="form-label">End Date</label>
                <input type="date" name="end_date" id="end_date" class="form-control">
            </div>

            <!-- Submit and Back Buttons -->
            <div class="col-md-12 d-flex justify-content-end">
                <button type="submit" class="btn btn-success me-2">
                    <i class="fa fa-paper-plane"></i> Submit
                </button>
                <a href="{{ route('home') }}" class="btn btn-secondary">
                    <i class="fa fa-arrow-left"></i> Back
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
