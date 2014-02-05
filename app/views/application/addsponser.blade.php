@extends('layout.master')

@section('breadcumbs')
    <li><a href="#">Home</a></li>
    <li><a href="{{ url("applicants") }}">applicants</a></li>
    <li ><a href="{{ url("applicant/{$app->id}") }}">{{ $app->firstname." ".$app->middlename." ".$app->lastname; }}</a></li>
    <li><a href="{{ url("applicant/application/{$applicat->id}") }}" > Loan Application</a></li>
    <li class="active">Add Sponsor</li>
@stop

@section('content')


    <div class="panel panel-default">
      <div class="panel-body">
          {{ Form::open(array("url"=>url("/applicant/add/application/sponsor/{$applicat->id}"),"class"=>"form-horizontal")) }}
          <h3>Add Sponsor <span class="pull-right" style="text-transform: capitalize">Applicant:{{ $app->firstname." ".$app->middlename." ".$app->lastname; }}</span></h3>
          <h4>Sponsor (Guarantor) Informaton</h4>
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
                        <div class='col-sm-6'>Residense<br>{{ Form::text('residense','',array('class'=>'form-control','placeholder'=>'Residence (Required)','required'=>'required')) }} </div>
                        <div class='col-sm-6'>Birth Date<br>{{ Form::text('birthdate','',array('class'=>'form-control','placeholder'=>'Bith Date','id'=>'Birth_Date')) }} </div>
                  </div>
               <div class='form-group'>
                    
                   <div class="col-sm-12">Other Information <br>{{ Form::textarea('other','',array('class'=>'form-control','placeholder'=>'Other Information(Optional)','rows'=>'3')) }} </div>
                </div>
          
          <div class='form-group text-center'>
            {{ Form::submit('Submit',array('class'=>'btn btn-primary','id'=>'submitqn')) }}
            {{ Form::reset('Reset',array('class'=>'btn btn-warning','id'=>'submitqn')) }}
            <a href="{{ url("applicant/application/{$applicat->id}") }}" class="btn btn-danger"><i class="fa fa-times"></i> Cancel</a>
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


