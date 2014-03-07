@extends('layout.master')

@section('breadcumbs')
<li><a href="#">Home</a></li>
<li><a href="{{ url("groups") }}">groups</a></li>
<li ><a href="{{ url("groups/{$group->id}") }}">{{ $group->name }}</a></li>
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
        <h3 class="text-center">Group: <a href="{{ url("groups/{$group->id}") }}">{{ $group->name }}</a></h3>

        <!--displaying previous applications-->
        <div class="col-sm-4" style="font-size: 12px">
            <h3>Applications</h3>
            @include("groupapp.list")
        </div>


        <!--displaying application form-->
        <div class="col-sm-8" id="editll">
@include("groupapp.add")

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