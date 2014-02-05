@extends('layout.master')

@section('breadcumbs')
    <li><a href="{{ url("dashboard") }}">Home</a></li>
    <li class="active">Loans</li>
@stop

@section('content')

<div class="row" style="margin: 5px">

    <div class="panel panel-default col-md-6">
      <div class="panel-body">
          <div class="row" id="editll">

          </div>
           <h3>Add Loan</h3>
          <div class="row">
              @include("loan.add")
          </div>
      </div>
    </div>

    <div class="panel panel-default col-md-6">
        <div class="panel-body">
            <h3>Loans</h3>
            <div class="row" id="listloan">
                @include("loan.list")
            </div>

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


