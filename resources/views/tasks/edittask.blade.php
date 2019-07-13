@extends('layout.layouts')
@section('content')

<div class = "container">
 
        <h2>Edit Timeline</h2>
        <hr>
        {!! Form::open(['action' => ['PagesController@updateTask', $task->id ], 'method'=> 'POST' ]) !!}
         <div class = "form-group">
        {{Form::label('taskname', 'Title of the Task')}}
        {{Form::text('taskname', $task->taskname , ['class' => 'form-control' , 'readonly'])}}
        
        {{Form::label('taskdesc', 'Task Desciption')}}
        {{Form::textarea('taskdesc', $task->taskdesc , ['class' => 'form-control', 'style' => 'resize:none;', 'readonly'])}}
                
        {{Form::label('subtasks', 'Sub Tasks (Optional)')}}
        {{Form::textarea('subtasks', $task->subtasks , ['class' => 'form-control', 'style' => 'resize:none;', 'readonly' ])}}

        {{Form::label('taskassignedto', 'Task Assigned To')}}
        {{Form::text('taskassignedto', $task->taskassignedto , ['class' => 'form-control' , 'readonly'])}}
       
        {{Form::label('taskassignedby', 'Task Assigned By')}}
        {{Form::text('taskassignedby', $task->taskassignedby , ['class' => 'form-control' , 'readonly'])}}
        
        {{Form::label('deadline', 'Deadline of Task')}}
        {{Form::date('deadline', $task->deadline , ['class' => 'form-control' , 'required'])}}
        
       
        </div>
        {{Form::submit('Update Timeline', ['class' => 'btn btn-warning'])}}
        {!! Form::close() !!}
        <br>
        <a class="btn btn-primary" href="/taskmanagement/public/">Go Back</a>
        </div>



@endsection