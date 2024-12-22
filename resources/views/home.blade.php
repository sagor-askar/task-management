@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        {{-- create form --}}
        <div class="card col-md-10 m-2 p-4">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Task Name</label>
                        <input type="text" class="form-control" id="" name="" placeholder="Task Name">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Start Date</label>
                        <input type="date" class="form-control" id="" name="" placeholder="">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">End Date</label>
                        <input type="date" class="form-control" id="" name="" placeholder="">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <button type="submit" class="btn btn-sm btn-success p-2 mt-2"><i class="fa fa-paper-plane"></i> Submit</button>
                    </div>
                </div>


            </div>
        </div>



        {{-- list --}}
        <div class="col-md-10 m-2 p-2">
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
                    <tr>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>
                            <a href="" class="btn btn-sm btn-success" style="border-radius: 50%"><i class="fa fa-edit"></i></a>
                            <a href="" class="btn btn-sm btn-danger" style="border-radius: 50%;"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
