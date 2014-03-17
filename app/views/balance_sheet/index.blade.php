@extends('layout.master')

@section('breadcumbs')
<li><a href="{{ url('home') }}">Home</a></li>
<li><a href="{{ url("applicants") }}">applicants</a></li>
<li ><a href="{{ url("applicant/{$app->id}") }}">{{ $app->firstname." ".$app->middlename." ".$app->lastname; }}</a></li>
<li class="active">Balance Sheet</li>
@stop
@section('content')

<div class="row" style="margin: 5px">


    <div class="panel panel-default">
        <div class="panel-body">
            <a class="btn btn-info btn-xs pull-right add" href="#">
            <i class="fa fa-plus"></i> Add Another</a>
            <h3>Balance Sheet</h3>
            <div class="row" id="listrules">
                @include("balance_sheet.show")
            </div>

        </div>
    </div>

    <div class="panel panel-default" style="margin-left: 10px">
        <div class="panel-body">
            <div class="row" id="editll">

                @include("balance_sheet.list")
            </div>
        </div>
    </div>

</div>
<script>
    $(document).ready(function(){
        $(".add").click(function(){
            $("#listrules").html("<h3><i class='fa fa-spin fa-spinner '></i><span>Loading please wait...</span><h3>");
            $("#listrules").load("<?php echo url("applicant/{$app->id}/balance_sheet/add") ?>")
        })
    })
</script>

@stop