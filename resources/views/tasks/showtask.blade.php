@extends('layout.layouts')
@section('content')

<h2>{{$task->taskname}}</h2>

 <hr>
 
   
 
     <div class="container">
        <h3 style="font-weight:bold;">Task Description:</h3>
        <p style="white-space: pre-wrap;">{{$task->taskdesc}}</p>

      <h3 style="font-weight:bold;">List of Sub Tasks:</h3>
      <p style="white-space: pre-wrap;">{{$task->subtasks}}</p>

      <br><br>
     
      
      <div class="dropdown">
        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" style="margin-left:6vw;float:right;">
          Change Status
        </button>
        <div class="dropdown-menu">
            @if($task->status === "ongoing")
            <a class="dropdown-item" href="/taskmanagement/public/changestatus/{{$task->id}}/completed">Completed</a>
            @else
            <a class="dropdown-item" href="/taskmanagement/public/changestatus/{{$task->id}}/ongoing">Ongoing</a>
            @endif
        </div>
      </div>

      <a class="btn btn-primary" href="/taskmanagement/public/" >Go Back</a>
     
      @if($task->status !== "completed")
       <a class="btn btn-primary" href="/taskmanagement/public/edit/{{$task->id}}">Edit Timeline</a>
      @endif
   {!!Form::open(['action' => ['PagesController@destroy', $task->id] , 'method' => 'Post', 'class' =>  'float-right']) !!}    
   {{Form::hidden('_method','DELETE')}}
   {{Form::submit('Delete Task',['class'=>'btn btn-danger',])}}

  {!!Form::close()  !!}
 

     </div>
  





@endsection