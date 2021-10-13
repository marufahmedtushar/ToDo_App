@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center" >
        <div class="col-md-8" style="background:#9DDEFF;border-radius: 5px;">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
            @endif
            @guest
            <div class="card">
                <div class="card-header">{{ __('My ToDo App') }}</div>
                
                
                @else
                <div class="card-body">
                    
                    <div class="panel-body">
                        <!-- Display Validation Errors -->
                        
                        <!-- New Task Form -->
                        <form action="/taskstore" method="POST" class="form-horizontal">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <!-- Task Name -->
                            <div class="form-group">
                                <label for="task" class="col-sm-3 control-label">Task</label>
                                <div class="col-md-12">
                                    <input type="text" name="title" id="task-name" class="form-control">
                                </div>
                            </div>
                            <!-- Add Task Button -->
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-plus"></i> Add Task
                                    </button>
                                    
                                </div>
                            </div>
                        </form>
                    </div>
                    
                </div>
                
                
            </div>
            </div>
            <div class="row justify-content-center">
        <div class="col-md-8 my-5" style="background:#9DDEFF;border-radius: 5px;">
            <div class="card my-5" style="background:#E3EAED ;">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Current Tasks
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <!-- Table Headings -->
                            <thead>
                                <th>Task</th>
                                <th></th>
                                <th></th>
                            </thead>
                            
                            <tbody>
                                
                                
                                @foreach($task as $tasks)
                                @if( Auth::user()->id == $tasks->user->id )
                                
                                <tr>
                                    <!-- Task Name -->
                                    <td class="table-text">
                                        <div>
                                            
                                            @if ( $tasks->is_complete == 1)
                                            <strike>{{ $tasks->title }}</strike>
                                            @else
                                            {{ $tasks->title }}
                                            @endif
                                            
                                        </div>
                                    </td>
                                    <td>
                                        <form action="/taskdelete/{{ $tasks->id }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            
                                            <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="/taskcomplete/{{ $tasks->id }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('PUT') }}
                                            <input type="hidden" name="is_complete" value="1" >
                                            <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-check-circle"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                                
                                
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endguest
            
        
    </div>
</div>
@endsection