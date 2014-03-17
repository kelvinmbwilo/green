@extends('layout.master')

@section('breadcumbs')
<li><a href="{{ url('home') }}">Home</a></li>
<li class="active">cash flow Parameters</li>
@stop

@section('content')

<div class="row" style="margin: 5px">


    <div class="panel panel-default col-md-7">
        <div class="panel-body">
            <h3>Cash Flow Parameters</h3>
            <div class="row" id="listrules">
                @include("cash_flow.list_parameters")
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
                @include("cash_flow.add_parameter")
            </div>
        </div>
    </div>

</div>


@stop