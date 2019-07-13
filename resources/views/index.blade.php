@extends('layout.layouts')
@section('content')
<div class="row">
 <div class="col-md-4">   
<div class="dropdown">
    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" style="margin-left: 6vw;">
      Select Filter
    </button>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="/taskmanagement/public/filtertasks/all">All Tasks</a>
      <a class="dropdown-item" href="/taskmanagement/public/filtertasks/ongoing">Ongoing Tasks</a>
      <a class="dropdown-item" href="/taskmanagement/public/filtertasks/completed">Completed Tasks</a>
      <a class="dropdown-item" href="/taskmanagement/public/filtertasks/deadlineNotMet">Missed Deadline</a>
    </div>
  </div>
 </div>
 <div class="col-md-4">
    <a href="/taskmanagement/public/addtask" class = "btn btn-primary">Add A Task</a> 
 </div>
 <div class="col-md-4">
        {!! Form::open(['action' => 'PagesController@search', 'method'=> 'POST','style'=>'margin-right: 8vw;' ]) !!}
        <div class = "form-group">
      
       {{Form::text('task', '' , ['class' => 'form-control' , 'placeholder'=> 'search here...','required'])}}
       </div>
       {{Form::submit('search', ['class' => 'btn btn-warning'])}}
       {!! Form::close() !!}
      
       
    </div>
</div>

<div class="container-fluid" style="margin-top:21vh;">
    <div class="card mb-3">
        <div class="card-header">
          <i class="fas fa-table"></i><a href="/taskmanagement/public">Home/</a>
          List of Tasks</div>
        <div class="card-body">
            @if($tasks->count()>0)
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                        
                     <th>Task Name</th>
                  <th>Task Assigned To</th>
                  <th>Task Assigned By</th>
                  <th>Task Assigned On</th>
                  <th>Task To Be Completed Before</th>
                  <th>Status</th>
                  
                </tr>
              </thead>
             
              <tbody>
                @foreach($tasks as $list)
                <tr>
                
                <td><a href="/taskmanagement/public/showtask/{{$list->id}}">{{$list->taskname}}</a></td>
                  <td>{{$list->taskassignedto}}</td>
                  <td>{{$list->taskassignedby}}</td>
                  <td>{{$list->taskassignedon}}</td>
                  <td>{{$list->deadline}}</td>
                  <td>{{$list->status}}</td>
                 
                  
                </tr>
             @endforeach
              </tbody>
            </table>
          </div>
          @else
          <p>No tasks to show</p>
           
          @endif  
        </div>
        <div class="card-footer">Last Updated at &nbsp; {{date('Y-m-d H:i:s')}}</div>
      </div>
  @endsection    