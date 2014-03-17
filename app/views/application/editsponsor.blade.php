@extends('layout.master')

@section('breadcumbs')
    <li><a href="{{ url('home') }}">Home</a></li>
    <li><a href="{{ url("applicants") }}">applicants</a></li>
    <li ><a href="{{ url("applicant/{$app->id}") }}">{{ $app->firstname." ".$app->middlename." ".$app->lastname; }}</a></li>
    <li class="active"><a href="{{ url("applicant/application/{$applicat->id}") }}" > Loan Application</a></li>
    <li class="active">Update Sponsor</li>
@stop

@section('content')


    <div class="panel panel-default">
      <div class="panel-body">
          {{ Form::open(array("url"=>url("/applicant/edit/application/sponsor/{$spo->id}"),"class"=>"form-horizontal")) }}
          <h3>Sponsor (Guarantor) Informaton</h3>
                  <div class='form-group'>
                      <div class='col-sm-6'>Firstname<br>{{ Form::text('firstname',$spo->firstname,array('class'=>'form-control','placeholder'=>'First Name','required'=>'required')) }} </div>
                      <div class='col-sm-6'>Middlename<br>{{ Form::text('middlename',$spo->middlename,array('class'=>'form-control','placeholder'=>'Middle Name')) }} </div>
                  </div>
                  <div class='form-group'>
                      <div class='col-sm-6'>Lastname<br>{{ Form::text('lastname',$spo->lastname,array('class'=>'form-control','placeholder'=>'Last Name','required'=>'required')) }} </div>
                      <div class='col-sm-6'>Gender<br>{{ Form::select('gender',array("Male"=>"Male","Female"=>"Female"),$spo->gender,array('class'=>'form-control','required'=>'requiered')) }} </div>
                  </div>
                  <div class='form-group'>
                        <div class='col-sm-6'>Phone Number<br>{{ Form::text('phone',$spo->phone,array('class'=>'form-control','placeholder'=>'Phone Number(Required)','required'=>'required')) }} </div>
                        <div class='col-sm-6'>Postal Address<br>{{ Form::text('postal',$spo->postal,array('class'=>'form-control','placeholder'=>'Postal Address(Optional)')) }} </div>
                  </div>
                  <div class='form-group'>
                        <div class='col-sm-6'>Residense<br>{{ Form::text('residense',$spo->residense,array('class'=>'form-control','placeholder'=>'Residence (Required)','required'=>'required')) }} </div>
                        <div class='col-sm-6'>Birth Date<br>{{ Form::text('birthdate',$spo->birthdate,array('class'=>'form-control','placeholder'=>'Bith Date','id'=>'Birth_Date')) }} </div>
                  </div>
               <div class='form-group'>
                    
                   <div class="col-sm-12">Other Information <br>{{ Form::textarea('other',$spo->other,array('class'=>'form-control','placeholder'=>'Other Information(Optional)','rows'=>'3')) }} </div>
                </div>
          
          <div class='form-group text-center'>
            {{ Form::submit('Update',array('class'=>'btn btn-primary','id'=>'submitqn')) }}
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


