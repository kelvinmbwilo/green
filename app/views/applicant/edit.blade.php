@extends('layout.master')

@section('breadcumbs')
    <li><a href="{{ url('home') }}">Home</a></li>
    <li><a href="{{ url("applicants") }}">applicants</a></li>
    <li ><a href="{{ url("applicant/{$app->id}") }}">{{ $app->firstname." ".$app->middlename." ".$app->lastname; }}</a></li>
    <li class="active">edit</li>
@stop

@section('content')
    <div class="panel panel-default">
      <div class="panel-body">
       
         {{ Form::open(array("url"=>url("applicant/edit/{$app->id}"),"class"=>"form-horizontal")) }}
         <h2 class="text-center text-muted">Loan Applicant Registration</h2>
         
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
            <div class='col-sm-8'>{{ Form::text('firstname',$app->firstname,array('class'=>'form-control','placeholder'=>'First Name','required'=>'required')) }} </div>
            </div>
             
              <div class='form-group'>
            {{ Form::label('lastname', 'Last Name',array('class'=>'control-label col-sm-4')) }}
            <div class='col-sm-8'>{{ Form::text('lastname',$app->lastname,array('class'=>'form-control','placeholder'=>'Last Name','required'=>'required')) }} </div>
            </div>
             
            <div class='form-group'>
                    {{ Form::label('gender', 'Gender',array('class'=>'control-label col-sm-4')) }}
                    <div class='col-sm-8'>{{ Form::select('gender',array("Male"=>"Male","Female"=>"Female"),$app->gender,array('class'=>'form-control','required'=>'requiered')) }}  </div>
                </div>
            <div class='form-group'>
                    {{ Form::label('marital', 'Marital Status',array('class'=>'control-label col-sm-4')) }}
                    <div class='col-sm-8'>{{ Form::select('marital',array("Single"=>"Single","Married"=>"Married","Devorced"=>"Devorced","Widow"=>"Widow","Widower"=>"Widower"),$app->marital_status,array('class'=>'form-control','required'=>'requiered')) }}  </div>
                </div>
        
             <div class='form-group'>
            {{ Form::label('residense', 'Residense Area',array('class'=>'control-label col-sm-4')) }}
            <div class='col-sm-8'>{{ Form::text('residense',$app->residense,array('class'=>'form-control','placeholder'=>'Residense Area','required'=>'required')) }} </div>
            </div>
         </div>
         
         <div class='col-sm-6'>
             
             <div class='form-group'>
            {{ Form::label('middlename', 'Middle Name',array('class'=>'control-label col-sm-4')) }}
            <div class='col-sm-8'>{{ Form::text('middlename',$app->middlename,array('class'=>'form-control','placeholder'=>'Middle Name')) }} </div>
            </div>
             
              <div class='form-group'>
            {{ Form::label('birthdate', 'Date of Birth',array('class'=>'control-label col-sm-4')) }}
            <div class='col-sm-8'>{{ Form::text('birthdate',$app->bitrhdate,array('class'=>'form-control','placeholder'=>'Date of Birth','required'=>'required','id'=>'Birth_Date')) }} </div>
            </div>
             
            <div class='form-group'>
            {{ Form::label('phone', 'Phone Number',array('class'=>'control-label col-sm-4')) }}
            <div class='col-sm-8'>{{ Form::text('phone',$app->phone,array('class'=>'form-control','placeholder'=>'Phone Number','required'=>'required')) }} </div>
            </div>
            <div class='form-group'>
            {{ Form::label('postal', 'Postal Address',array('class'=>'control-label col-sm-4')) }}
            <div class='col-sm-8'>{{ Form::text('postal',$app->postal_address,array('class'=>'form-control','placeholder'=>'Postal Address','required'=>'required')) }} </div>
            </div>
             
              <div class='form-group'>
            {{ Form::label('family', 'Family Size ',array('class'=>'control-label col-sm-4')) }}
            <div class='col-sm-8'>{{ Form::select('family',range(1,30),$app->family_size,array('class'=>'form-control','required'=>'requiered')) }}  </div>
            </div>
        
         </div>
    

       <div class='col-sm-12 form-group text-center'>
            {{ Form::submit('Update',array('class'=>'btn btn-primary','id'=>'submitqn')) }}
        </div>
      {{ Form::close() }}
    </div>
      </div>

<script>
$(document).ready(function (){
    $("#Birth_Date").datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: "1900:2017",
        dateFormat:"yy-mm-dd"
    });
});
</script>
@stop