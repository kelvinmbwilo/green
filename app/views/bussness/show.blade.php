@extends('layout.master')

@section('breadcumbs')
    <li><a href="#">Home</a></li>
    <li><a href="{{ url("applicants") }}">applicants</a></li>
    <li ><a href="{{ url("applicant/{$app->id}") }}">{{ $app->firstname." ".$app->middlename." ".$app->lastname; }}</a></li>
    <li class="active">bussness</li>
@stop

@section('content')


    <div class="panel panel-default">
      <div class="panel-body">
          <h3>  <a href="{{ url("applicant/edit/bussness/{$bus->id}") }}" title='update business information' class="btn btn-warning btn-xs pull-right">
                          <i class="fa fa-pencil"></i> Edit
                      </a>
         {{ $bus->discr }}</h3>
       @include("bussness.info")
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

