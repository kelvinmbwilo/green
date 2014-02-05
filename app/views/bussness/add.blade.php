@extends('layout.master')

@section('breadcumbs')
    <li><a href="#">Home</a></li>
    <li><a href="{{ url("applicants") }}">applicants</a></li>
    <li ><a href="{{ url("applicant/{$app->id}") }}">{{ $app->firstname." ".$app->middlename." ".$app->lastname; }}</a></li>
    <li class="active">Add bussness</li>
@stop

@section('content')
    <div class="panel panel-default">
      <div class="panel-body">
       
         {{ Form::open(array("url"=>route('addapplicantbuss1'),"class"=>"form-horizontal")) }}
         
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
         
         <h2 class="text-center text-muted">Loan Applicant Bussiness Registration</h2>
         <h4 class="text-center">Applicant: <a href="{{ url("applicant/{$app->id}") }}">{{ $app->firstname." ".$app->middlename." ".$app->lastname; }}</a></h4>
         <div class='col-sm-6'>
             <input type="hidden" value="{{ $app->id }}" name='id'>
             <div class='form-group'>
            {{ Form::label('startyear', 'Start Year',array('class'=>'control-label col-sm-4')) }}
            <div class='col-sm-8'>{{ Form::text('startyear','',array('class'=>'form-control','placeholder'=>'Start Year','required'=>'required','id'=>'Birth_Date')) }} </div>
            </div>
             
              <div class='form-group'>
            {{ Form::label('locaton', 'Business Location',array('class'=>'control-label col-sm-4')) }}
            <div class='col-sm-8'>{{ Form::text('locaton','',array('class'=>'form-control','placeholder'=>'Business Location','required'=>'required')) }} </div>
            </div>
             
            <div class='form-group'>
                    {{ Form::label('start', 'Starting Captal',array('class'=>'control-label col-sm-4')) }}
                    <div class='col-sm-8'>{{ Form::text('start','',array("pattern"=>"\d*",'class'=>'form-control','placeholder'=>'Starting Captal (Amount Tsh)','required'=>'required')) }} </div>
                </div>
            <div class='form-group'>
                    {{ Form::label('daily', 'Daily Turnover',array('class'=>'control-label col-sm-4')) }}
                    <div class='col-sm-8'>{{ Form::text('daily','',array("pattern"=>"\d*",'class'=>'form-control','placeholder'=>'Daily Turnover (Amount Tsh)','required'=>'required')) }} </div>
                </div>
        
             <div class='form-group'>
            {{ Form::label('bexpense', 'Monthly Business Expenses',array('class'=>'control-label col-sm-4')) }}
            <div class='col-sm-8'>{{ Form::text('bexpense','',array("pattern"=>"\d*",'class'=>'form-control','placeholder'=>'Business Expenses (Amount Tsh)','required'=>'required')) }} </div>
            </div>
         </div>
         
         <div class='col-sm-6'>
             
             <div class='form-group'>
            {{ Form::label('discription', 'Business Description',array('class'=>'control-label col-sm-4')) }}
            <div class='col-sm-8'>{{ Form::textarea('discription','',array('rows'=>'3','class'=>'form-control','placeholder'=>'Business Description','required'=>'required')) }} </div>
            </div>
             
            <div class='form-group'>
            {{ Form::label('current', 'Current Captal',array('class'=>'control-label col-sm-4')) }}
            <div class='col-sm-8'>{{ Form::text('current','',array("pattern"=>"\d*",'class'=>'form-control','placeholder'=>'Current Captal (Amount in Tsh)','required'=>'required')) }} </div>
            </div>
            <div class='form-group'>
            {{ Form::label('mountly', 'Monthly Turnover',array('class'=>'control-label col-sm-4')) }}
            <div class='col-sm-8'>{{ Form::text('mountly','',array("pattern"=>"\d*",'class'=>'form-control','placeholder'=>'Monthly Turnover (Amount in Tsh)','required'=>'required')) }} </div>
            </div>
             
              <div class='form-group'>
            {{ Form::label('nonbexpe', 'Monthly Non Business Expenses ',array('class'=>'control-label col-sm-4')) }}
            <div class='col-sm-8'>{{ Form::text('nonbexpe','',array("pattern"=>"\d*",'class'=>'form-control','placeholder'=>'Non Business Expenses (Amount  in Tsh)','required'=>'required')) }} </div>
            </div>
        
         </div>
    

       <div class='col-sm-12 form-group text-center'>
            {{ Form::submit('Register',array('class'=>'btn btn-primary','id'=>'submitqn')) }}
            {{ Form::reset('Reset',array('class'=>'btn btn-warning','id'=>'submitqn')) }}
            <a href="{{ url("applicant/{$app->id}") }}" class="btn btn-danger"><i class="fa fa-times"></i> Cancel</a>
        </div>
      {{ Form::close() }}
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