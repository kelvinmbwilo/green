@extends('layout.master')

@section('breadcumbs')
<li><a href="{{ url("home") }}">Home</a></li>
<li><a href="{{ url("groups") }}">Groups</a></li>
<li class="active">{{ $group->name }}</li>
@stop

@section('content')
<?php
$gsaving = 0;
foreach($group->memberes as $gmember){
    $sav = ($gmember->applicant->savings()->count() == 0)?0:$gmember->applicant->savings->amount;
    $gsaving += $sav;
}
?>
<div class="panel panel-default">
   <h3> Name:{{ $group->name }} </h3>
    <h4>Members:{{ $group->memberes()->count() }}</h4>
    <h4>Savings:{{ $gsaving }}</h4>

</div>
<div class="col-xs-12">
    <div class="thumbnail col-md-7">
      @include("group.members")
    </div>
    <div class="thumbnail col-md-5">
      @include("groupapp.list")
    </div>
</div>

@stop