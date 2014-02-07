@extends('layout.master')

@section('breadcumbs')
    <li><a href="#">Home</a></li>
    <li><a href="{{ url("applicants") }}">applicants</a></li>
    <li ><a href="{{ url("applicant/{$app->id}") }}">{{ $app->firstname." ".$app->middlename." ".$app->lastname; }}</a></li>
    <li class="active">Loan Application</li>
@stop

@section('content')
    <div class="panel panel-default">
      <div class="panel-body">
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
         <h2 class="text-center text-muted">Loan Application</h2>
         <h3 class="text-center">Applicant: <a href="{{ url("applicant/{$app->id}") }}">{{ $app->firstname." ".$app->middlename." ".$app->lastname; }}</a></h3>
         
         <!--displaying previous applications-->
          <div class="col-sm-4" style="font-size: 12px">
              <h3>Applications</h3>
             @include("application.list")
          </div>
         
         
         <!--displaying application form-->
          <div class="col-sm-8">
              
              
              {{ Form::open(array("url"=>route('addapplicaion1'),"class"=>"form-horizontal")) }}
         
        @if(Busssiness::where("apllicant_id",$app->id)->get()->count() == 0)
        <h3><i class="fa fa-exclamation-circle"></i> To Apply for loan Applicant must have at least one registered Bussiness </h3>
        <a href="{{ url("applicant/{$app->id}/add/bussness") }}" class="btn btn-warning btn-block btn-lg"><i class="fa fa-plus-square-o"></i> Add a bussness first</a>
        @else
        @if($app->application()->where("status","pending")->get()->count() != 0)
        <h2 class="text-info"><i class="fa fa-exclamation"></i> Info</h2>
        <h4>You can not add application for this Applicant, he/she have already applied for a loan, The Application may either be processed or the applicant has an unpaid Loan</h4>
        @else
         <h3>Application Form</h3>
        <div class="thumbnail">
        
        <h3>Loan Information</h3>
             <input type="hidden" value="{{ $app->id }}" name='id'>
             @if(isset($bus))
                <h3 class="text-center">Business: <a href="{{ url("applicant/bussness/{$bus->id}") }}">{{ $bus->discr; }}</a></h3>
                <input type="hidden" value="{{ $bus->id }}" name='business'>
             @else
             
             <div class='form-group'>
                    {{ Form::label('business', 'Business',array('class'=>'control-label col-sm-3')) }}
                    <div class='col-sm-9'>{{ Form::select('business',Busssiness::where("apllicant_id",$app->id)->lists("discr","id"),'',array('class'=>'form-control','required'=>'requiered')) }}  </div>
                </div>
             @endif
             
             <div class='form-group'>
            {{ Form::label('applied', 'Applied Amount (in Tsh)',array('class'=>'control-label col-sm-3')) }}
            <div class='col-sm-9'>{{ Form::text('applied','',array("pattern"=>"\d*",'class'=>'form-control','placeholder'=>'Applied Amount','required'=>'required')) }} </div>
            </div>
             
             <div class='form-group'>
            {{ Form::label('collateral', 'Collateral',array('class'=>'control-label col-sm-3')) }}
            <div class='col-sm-9'>{{ Form::textarea('collateral','',array('class'=>'form-control','placeholder'=>'Assets For Loan','rows'=>'3')) }} </div>
            </div>
             
             <div class='form-group'>
            {{ Form::label('comments', 'Any Comments',array('class'=>'control-label col-sm-3')) }}
            <div class='col-sm-9'>{{ Form::textarea('comments','',array('class'=>'form-control','placeholder'=>'Any Comments','rows'=>'3')) }} </div>
            </div>
        
        </div>
          <div class="thumbnail">
              <h3>Sponsor (Guarantor) Informaton</h3>
                  <div class='form-group'>
                      <div class='col-sm-6'>Firstname<br>{{ Form::text('firstname','',array('class'=>'form-control','placeholder'=>'First Name','required'=>'required')) }} </div>
                      <div class='col-sm-6'>Middlename<br>{{ Form::text('middlename','',array('class'=>'form-control','placeholder'=>'Middle Name')) }} </div>
                  </div>
                  <div class='form-group'>
                      <div class='col-sm-6'>Lastname<br>{{ Form::text('lastname','',array('class'=>'form-control','placeholder'=>'Last Name','required'=>'required')) }} </div>
                      <div class='col-sm-6'>Gender<br>{{ Form::select('gender',array("Male"=>"Male","Female"=>"Female"),'',array('class'=>'form-control','required'=>'requiered')) }} </div>
                  </div>
                  <div class='form-group'>
                        <div class='col-sm-6'>Phone Number<br>{{ Form::text('phone','',array('class'=>'form-control','placeholder'=>'Phone Number(Required)','required'=>'required')) }} </div>
                        <div class='col-sm-6'>Postal Address<br>{{ Form::text('postal','',array('class'=>'form-control','placeholder'=>'Postal Address(Optional)')) }} </div>
                  </div>
                  <div class='form-group'>
                        <div class='col-sm-6'>Residence<br>{{ Form::text('residense','',array('class'=>'form-control','placeholder'=>'Residence (Required)','required'=>'required')) }} </div>
                        <div class='col-sm-6'>Birth Date<br>{{ Form::text('birthdate','',array('class'=>'form-control','placeholder'=>'Bith Date','id'=>'Birth_Date')) }} </div>
                  </div>
               <div class='form-group'>
                    
                   <div class="col-sm-12">Other Information <br>{{ Form::textarea('other','',array('class'=>'form-control','placeholder'=>'Other Information(Optional)','rows'=>'3')) }} </div>
                </div>

        </div>
        
          <div class='form-group text-center'>
            {{ Form::submit('Register',array('class'=>'btn btn-primary','id'=>'submitqn')) }}
            {{ Form::reset('Reset',array('class'=>'btn btn-warning','id'=>'submitqn')) }}
            <a href="{{ url("applicant/{$app->id}") }}" class="btn btn-danger"><i class="fa fa-times"></i> Cancel</a>
        </div>
             @endif <!-- ending the if to check if the user is vaiable to take a loan-->
       @endif
      {{ Form::close() }}
     
      </div>
   
         
      </div>
        
      </div>

<script>
$(document).ready(function (){
     $("#Birth_Date").datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: "1950:<?php echo date("Y") ?>",
        dateFormat:"yy-mm-dd"
    });
});
</script>
@stop