@extends('layout.layouts')
@section('content')
<div class="row">
 <div class="col-md-6">   

 </div>
 <div class="col-md-6">
        {!! Form::open(['action' => 'PagesController@search', 'method'=> 'POST' ]) !!}
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
          <i class="fas fa-table"></i>
          List of Tasks</div>
        <div class="card-body">
          <p>Your search yield no results.<br>
            Try again or Go back.</p>
            <a class="btn btn-primary" href="/taskmanagement/public">Go Back</a>  
        </div>
        <div class="card-footer">Last Updated at &nbsp; {{date('Y-m-d H:i:s')}}</div>
      </div>
</div>
  @endsection    