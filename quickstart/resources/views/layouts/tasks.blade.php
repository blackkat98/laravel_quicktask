<!-- resources/views/tasks.blade.php -->

@extends('layouts.app')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
@endsection

@section('js')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('layouts.errors')

        <!-- New Task Form -->
        <form action="{{ route('store') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- Task Name -->
            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Task</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control">
                </div>
            </div>

            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add Task
                    </button>
                </div>
            </div>
        </form>
    </div>

    <table id="user_manager" class="table table-bordered table-striped">
        <tr>
            <td> ID </td>
            <td> Name </td>
            <td> Tools </td>
        </tr>
        @foreach($tasks as $task)
        <tr>
            <td> {{ $task->id }} </td>
            <td> {{ $task->name }} </td>
            <td>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete_task_{{ $task->id }}"><i class="fa fa-trash"></i> Delete </button>

                <form method="post" action="{{ route('destroy',['id'=> $task->id ]) }}" >
                    {{ csrf_field() }}
                    <div class="modal fade" id="delete_task_{{ $task->id }}" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Are you sure delete the task named {{ $task->name }} ?</h4>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    <!-- TODO: Current Tasks -->
@endsection