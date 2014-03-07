@extends('layout.master')

@section('breadcumbs')
    <li><a href="#">Home</a></li>
    <li><a href="{{ url("applicants") }}">applicants</a></li>
    <li class="active">add</li>
@stop

@section('content')
    <div class="panel panel-default">
      <div class="panel-body">
       
         {{ Form::open(array("url"=>route('addapplicant1'),"class"=>"form-horizontal")) }}
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
                    {{ Form::label('marital', 'Marital Status',array('class'=>'control-label col-sm-4')) }}
                    <div class='col-sm-8'>{{ Form::select('marital',array("Single"=>"Single","Married"=>"Married","Devorced"=>"Devorced","Widow"=>"Widow","Widower"=>"Widower"),'',array('class'=>'form-control','required'=>'requiered')) }}  </div>
                </div>
        
             <div class='form-group'>
            {{ Form::label('residense', 'Residence Area',array('class'=>'control-label col-sm-4')) }}
            <div class='col-sm-8'>{{ Form::text('residense','',array('class'=>'form-control','placeholder'=>'Residence Area','required'=>'required')) }} </div>
            </div>
         </div>
         
         <div class='col-sm-6'>
             
             <div class='form-group'>
            {{ Form::label('middlename', 'Middle Name',array('class'=>'control-label col-sm-4')) }}
            <div class='col-sm-8'>{{ Form::text('middlename','',array('class'=>'form-control','placeholder'=>'Middle Name')) }} </div>
            </div>
             
              <div class='form-group'>
            {{ Form::label('birthdate', 'Date of Birth',array('class'=>'control-label col-sm-4')) }}
            <div class='col-sm-8'>{{ Form::text('birthdate','',array('class'=>'form-control','placeholder'=>'Date of Birth','required'=>'required','id'=>'Birth_Date')) }} </div>
            </div>
             
            <div class='form-group'>
            {{ Form::label('phone', 'Phone Number',array('class'=>'control-label col-sm-4')) }}
            <div class='col-sm-8'>{{ Form::text('phone','',array('class'=>'form-control','placeholder'=>'Phone Number','required'=>'required')) }} </div>
            </div>
            <div class='form-group'>
            {{ Form::label('postal', 'Postal Address',array('class'=>'control-label col-sm-4')) }}
            <div class='col-sm-8'>{{ Form::text('postal','',array('class'=>'form-control','placeholder'=>'Postal Address')) }} </div>
            </div>
             
              <div class='form-group'>
            {{ Form::label('family', 'Family Size ',array('class'=>'control-label col-sm-4')) }}
            <div class='col-sm-8'>{{ Form::select('family',range(1,30),'',array('class'=>'form-control','required'=>'requiered')) }}  </div>
            </div>
        
         </div>
    

       <div class='col-sm-12 form-group text-center'>
            {{ Form::submit('Register',array('class'=>'btn btn-primary','id'=>'submitqn')) }}
              {{ Form::reset('Reset',array('class'=>'btn btn-warning','id'=>'submitqn')) }}
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