@extends('layout.master')

@section('breadcumbs')
<li><a href="{{ url("home") }}">Home</a></li>
<li class="active">Rules</li>
@stop

@section('content')

<div class="row" style="margin: 5px">

    <div class="panel panel-default col-md-6">
        <div class="panel-body">
            <div class="row" id="editll">

            </div>
            <h3>Add Rules</h3>
            <div class="row">
                @include("Rules.add")
            </div>
        </div>
    </div>

    <div class="panel panel-default col-md-6">
        <div class="panel-body">
            <h3>Rules</h3>
            <div class="row" id="listrules">
                @include("Rules.list")
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


