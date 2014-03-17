@extends('layout.master')

@section('breadcumbs')
<li><a href="{{ url('home') }}">Home</a></li>
<li><a href="{{ url("groups") }}">Groups</a></li>
<li class="active">Add Group</li>
@stop

@section('content')
<div class="panel panel-default">
    <div class="panel-body">

        {{ Form::open(array("url"=>url('groups/add'),"class"=>"form-horizontal")) }}

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

        <h2 class="text-center text-muted">Add Group</h2>

        <div class='col-sm-9'>

            <div class='form-group'>
                {{ Form::label('name', 'Group Name',array('class'=>'control-label col-sm-4')) }}
                <div class='col-sm-8'>{{ Form::textarea('name','',array('rows'=>'3','class'=>'form-control','placeholder'=>'Group Name','required'=>'required')) }} </div>
            </div>
        </div>


        <div class='col-sm-12 form-group text-center'>
            {{ Form::submit('Submit',array('class'=>'btn btn-primary','id'=>'submitqn')) }}
            {{ Form::reset('Reset',array('class'=>'btn btn-warning','id'=>'submitqn')) }}
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