@extends('layout.master')

@section('breadcumbs')
<li><a href="{{ url('home') }}">Home</a></li>
<li class="active">balance sheet Parameters</li>
@stop

@section('content')

<div class="row" style="margin: 5px">


    <div class="panel panel-default col-md-7">
        <div class="panel-body">
            <h3>Parameters</h3>
            <div class="row" id="listrules">
                @include("parameters.list")
            </div>

        </div>
    </div>

    <div class="panel panel-default col-md-4" style="margin-left: 10px">
        <div class="panel-body">
            <div class="row" id="editll">

            </div>

            <div class="row">
                <div id="editll">

                </div>
                @include("parameters.add")
            </div>
        </div>
    </div>

</div>


@stop