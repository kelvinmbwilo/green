@extends('layout.master')

@section('breadcumbs')
    <li><a href="{{ url('home') }}">Home</a></li>
    <li><a href="{{ url("applicants") }}">applicants</a></li>
    <li ><a href="{{ url("applicant/{$app->id}") }}">{{ $app->firstname." ".$app->middlename." ".$app->lastname; }}</a></li>
    <li class="active"><a href="{{ url("applicant/bussness/{$bus->id}") }}">bussness</a></li>
    <li class="active">Edit</li>
@stop

@section('content')
    <div class="panel panel-default">
      <div class="panel-body">
       
         {{ Form::open(array("url"=>url("applicant/edit/bussness/{$bus->id}"),"class"=>"form-horizontal")) }}
         
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
         
         <h2 class="text-center text-muted">Update Bussiness Information</h2>
         <h4 class="text-center">Applicant: <a href="{{ url("applicant/{$app->id}") }}">{{ $app->firstname." ".$app->middlename." ".$app->lastname; }}</a></h4>
         <div class='col-sm-6'>
             <input type="hidden" value="{{ $app->id }}" name='id'>
             <div class='form-group'>
            {{ Form::label('startyear', 'Start Year',array('class'=>'control-label col-sm-4')) }}
            <div class='col-sm-8'>{{ Form::text('startyear',$bus->start_year,array('class'=>'form-control','placeholder'=>'Start Year','required'=>'required','id'=>'Birth_Date')) }} </div>
            </div>
             
              <div class='form-group'>
            {{ Form::label('locaton', 'Business Location',array('class'=>'control-label col-sm-4')) }}
            <div class='col-sm-8'>{{ Form::text('locaton',$bus->busness_location,array('class'=>'form-control','placeholder'=>'Business Location','required'=>'required')) }} </div>
            </div>
             
            <div class='form-group'>
                    {{ Form::label('start', 'Starting Captal',array('class'=>'control-label col-sm-4')) }}
                    <div class='col-sm-8'>{{ Form::text('start',$bus->initial_captal,array("pattern"=>"\d*",'class'=>'form-control','placeholder'=>'Starting Captal (Amount Tsh)','required'=>'required')) }} </div>
                </div>
            <div class='form-group'>
                    {{ Form::label('daily', 'Daily Turnover',array('class'=>'control-label col-sm-4')) }}
                    <div class='col-sm-8'>{{ Form::text('daily',$bus->daily_turnover,array("pattern"=>"\d*",'class'=>'form-control','placeholder'=>'Daily Turnover (Amount Tsh)','required'=>'required')) }} </div>
                </div>
        
             <div class='form-group'>
            {{ Form::label('bexpense', 'Monthly Business Expenses',array('class'=>'control-label col-sm-4')) }}
            <div class='col-sm-8'>{{ Form::text('bexpense',$bus->business_expense,array("pattern"=>"\d*",'class'=>'form-control','placeholder'=>'Business Expenses (Amount Tsh)','required'=>'required')) }} </div>
            </div>
         </div>
         
         <div class='col-sm-6'>
             
             <div class='form-group'>
            {{ Form::label('discription', 'Business Description',array('class'=>'control-label col-sm-4')) }}
            <div class='col-sm-8'>{{ Form::textarea('discription',$bus->discr,array('rows'=>'3','class'=>'form-control','placeholder'=>'Business Description')) }} </div>
            </div>
             
            <div class='form-group'>
            {{ Form::label('current', 'Current Captal',array('class'=>'control-label col-sm-4')) }}
            <div class='col-sm-8'>{{ Form::text('current',$bus->current_captal,array("pattern"=>"\d*",'class'=>'form-control','placeholder'=>'Current Captal (Amount in Tsh)','required'=>'required')) }} </div>
            </div>
            <div class='form-group'>
            {{ Form::label('mountly', 'Monthly Turnover',array('class'=>'control-label col-sm-4')) }}
            <div class='col-sm-8'>{{ Form::text('mountly',$bus->monthly_turnover,array("pattern"=>"\d*",'class'=>'form-control','placeholder'=>'Monthly Turnover (Amount in Tsh)','required'=>'required')) }} </div>
            </div>
             
              <div class='form-group'>
            {{ Form::label('nonbexpe', 'Monthly Non Business Expenses ',array('class'=>'control-label col-sm-4')) }}
            <div class='col-sm-8'>{{ Form::text('nonbexpe',$bus->non_business_expense,array("pattern"=>"\d*",'class'=>'form-control','placeholder'=>'Non Business Expenses (Amount  in Tsh)','required'=>'required')) }} </div>
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
        yearRange: "1950:<?php echo date("Y") ?>",
        dateFormat:"yy-mm-dd"
    });
});
</script>
@stop