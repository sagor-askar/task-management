@extends('layouts.app')

<!-- DataTables CSS -->
<link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

@section('content')

    <div class="container">
        {{-- task create button --}}
        <div class="form-group">
            <a href="{{ route('tasks.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add Task</a>
        </div>

        @if ($tasks->isEmpty())
            <p>No tasks found.</p>
        @else
            <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
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
                    @foreach ($tasks as $task)
                        <tr>
                            <td>{{ $task->id }}</td>
                            <td>{{ $task->task_name }}</td>
                            <td>{{ $task->start_date }}</td>
                            <td>{{ $task->end_date }}</td>
                            <td>
                                @if ($task->status == 0)
                                    Pending
                                @elseif($task->status == 1)
                                    In Progress
                                @elseif($task->status == 2)
                                    Completed
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary"><i
                                        class="fa fa-edit"></i></a>

                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>



    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                responsive: true,
                pageLength: 5,
                lengthChange: true,
                ordering: true,
                autoWidth: false,
            });
        });
    </script>
@endsection
