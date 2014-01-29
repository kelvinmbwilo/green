@extends('layout.master')

@section('breadcumbs')
    <li><a href="#">Home</a></li>
    <li><a href="{{ url("user") }}">users</a></li>
    <li class="active">add</li>
@stop

@section('content')
    <div class="panel panel-default">
      <div class="panel-body">
       
         {{ Form::open(array("url"=>route('adduser1'),"class"=>"form-horizontal")) }}
         <h2 class="text-center text-muted">Add new User</h2>
         
         <!--response messages-->
         @if(isset($emsg))
         <div class="alert alert-danger alert-dismissable" >
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>{{ $emsg }}!</strong> 
          </div>
         @endif
         
         @if(isset($msg))
         <div class="alert alert-success alert-dismissable" >
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>{{ $msg }}!</strong> 
          </div>
         @endif
         <div class='col-sm-6'>
             
             <div class='form-group'>
            {{ Form::label('firstname', 'First Name',array('class'=>'control-label col-sm-4')) }}
            <div class='col-sm-8'>{{ Form::text('firstname','',array('class'=>'form-control','placeholder'=>'First Name','required'=>'required')) }} </div>
            </div>
             
              <div class='form-group'>
            {{ Form::label('lastname', 'Last Name',array('class'=>'control-label col-sm-4')) }}
            <div class='col-sm-8'>{{ Form::text('lastname','',array('class'=>'form-control','placeholder'=>'Last Name','required'=>'required')) }} </div>
            </div>
             
            <div class='form-group'>
                    {{ Form::label('gender', 'Gender',array('class'=>'control-label col-sm-4')) }}
                    <div class='col-sm-8'>{{ Form::select('gender',array("Male"=>"Male","Female"=>"Female"),'',array('class'=>'form-control','required'=>'requiered')) }}  </div>
                </div>
            <div class='form-group'>
                    {{ Form::label('role', 'Role',array('class'=>'control-label col-sm-4')) }}
                    <div class='col-sm-8'>{{ Form::select('role',array("admin"=>"Administrator","officer"=>"Loan Officer"),'',array('class'=>'form-control','required'=>'requiered')) }}  </div>
                </div>
        
         </div>
         
         <div class='col-sm-6'>
             
             <div class='form-group'>
            {{ Form::label('middlename', 'Middle Name',array('class'=>'control-label col-sm-4')) }}
            <div class='col-sm-8'>{{ Form::text('middlename','',array('class'=>'form-control','placeholder'=>'Middle Name')) }} </div>
            </div>
             
              <div class='form-group'>
            {{ Form::label('email', 'Email',array('class'=>'control-label col-sm-4')) }}
            <div class='col-sm-8'>{{ Form::email('email','',array('class'=>'form-control','placeholder'=>'Email','required'=>'required')) }} </div>
            </div>
             
            <div class='form-group'>
            {{ Form::label('phone', 'Phone Number',array('class'=>'control-label col-sm-4')) }}
            <div class='col-sm-8'>{{ Form::text('phone','',array('class'=>'form-control','placeholder'=>'Phone Number','required'=>'required')) }} </div>
            </div>
            <div class='form-group'>
            {{ Form::label('password', 'Password',array('class'=>'control-label col-sm-4')) }}
            <div class='col-sm-8'>{{ Form::password('password',array('class'=>'form-control','placeholder'=>'Password','required'=>'required')) }} </div>
            </div>
             
              <div class='form-group'>
            {{ Form::label('repassword', 'Re-Password ',array('class'=>'control-label col-sm-4')) }}
            <div class='col-sm-8'>{{ Form::password('repassword',array('class'=>'form-control','placeholder'=>'Re-Password','required'=>'required')) }} </div>
            </div>
        
         </div>
    

       <div class='col-sm-12 form-group text-center'>
            {{ Form::submit('Add User',array('class'=>'btn btn-primary','id'=>'submitqn')) }}
              {{ Form::reset('Reset',array('class'=>'btn btn-warning','id'=>'submitqn')) }}
        </div>
      {{ Form::close() }}
    </div>
      </div>
@stop