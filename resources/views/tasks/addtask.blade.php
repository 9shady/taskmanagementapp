@extends('layout.layouts')
@section('content')

<div class = "container">
 
        <h2>Add a Task</h2>
        <hr>
        {!! Form::open(['action' => 'PagesController@storetask', 'method'=> 'POST' ]) !!}
         <div class = "form-group">
        {{Form::label('taskname', 'Title of the Task')}}
        {{Form::text('taskname', '' , ['class' => 'form-control' , 'required'])}}
        
        {{Form::label('taskdesc', 'Task Desciption')}}
        {{Form::textarea('taskdesc', '' , ['class' => 'form-control', 'style' => 'resize:none;', 'required'])}}
                
        {{Form::label('subtasks', 'Sub Tasks (Optional)')}}
        {{Form::textarea('subtasks', '' , ['class' => 'form-control', 'style' => 'resize:none;', ])}}

        {{Form::label('taskassignedto', 'Task Assigned To')}}
        {{Form::text('taskassignedto', '' , ['class' => 'form-control' , 'required'])}}
       
        {{Form::label('taskassignedby', 'Task Assigned By')}}
        {{Form::text('taskassignedby', '' , ['class' => 'form-control' , 'required'])}}
        
        {{Form::label('deadline', 'Deadline of Task')}}
        {{Form::date('deadline', '' , ['class' => 'form-control' , 'required'])}}
        
       
        </div>
        {{Form::submit('Add Task', ['class' => 'btn btn-primary'])}}
        {!! Form::close() !!}
   
        <br>
        <a class="btn btn-primary" href="/taskmanagement/public/">Go Back</a>
        </div>



@endsection