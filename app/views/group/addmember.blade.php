@extends('layout.master')

@section('breadcumbs')
<li><a href="{{ url("home") }}">Home</a></li>
<li><a href="{{ url("groups") }}">Groups</a></li>
<li class="active">{{ $group->name }}</li>
@stop

@section('content')

<div class="row" style="margin: 5px">

    <div class="panel panel-default col-md-7">
        <div class="panel-body">
            <div class="row" id="">
              <h3>{{ $group->name }}</h3>

            </div>
            <h3>Group Members</h3>

            <div class="row" id="listmember">
                <span id="load"></span>
                @include("group.listmembers")
            </div>
        </div>
    </div>

    <div class="panel panel-default col-md-5">
        <div class="panel-body">

            <div class="row" id="editll" style="padding-top: 10px">

            </div>
            <p>
                <a href="#b" class="btn btn-default pull-left" id="addnew"><i class="fa fa-plus-square-o"></i> New</a>
                <a href="#b" class="btn btn-default pull-right" id="addlist"><i class="fa fa-list"></i> From List</a>
            </p>
            <h3>Add Member</h3>
            <div class="row" id="addmembers">
                @include("group.newmember")
            </div>

        </div>
    </div>
</div>

<script>
    $(document).ready(function (){
       $("#addnew").click(function(){
           $("#addmembers").html("<h3><i class='fa fa-spin fa-spinner '></i><span>loading...</span><h3>");
           $("#addmembers").load("<?php echo url("group/{$group->id}/add/new") ?>");
       })
        $("#addlist").click(function(){
            $("#addmembers").html("<h3><i class='fa fa-spin fa-spinner '></i><span>loading...</span><h3>");
            $("#addmembers").load("<?php echo url("group/{$group->id}/add/list") ?>");
        })
    });
</script>
@stop


