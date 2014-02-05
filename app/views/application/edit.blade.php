@extends('layout.master')

@section('breadcumbs')
    <li><a href="#">Home</a></li>
    <li><a href="{{ url("applicants") }}">applicants</a></li>
    <li ><a href="{{ url("applicant/{$app->id}") }}">{{ $app->firstname." ".$app->middlename." ".$app->lastname; }}</a></li>
    <li class="active"><a href="{{ url("applicant/application/{$applicat->id}") }}" > Loan Application</a></li>
    <li class="active">Edit Application</li>
@stop

@section('content')


    <div class="panel panel-default">
      <div class="panel-body">
          {{ Form::open(array("url"=>url("applicant/edit/application/{$applicat->id}"),"class"=>"form-horizontal")) }}
          <div class='form-group'>
                    {{ Form::label('business', 'Busines',array('class'=>'control-label col-sm-3')) }}
                    <div class='col-sm-9'>{{ Form::select('business',Busssiness::where("apllicant_id",$app->id)->lists("discr","id"),$applicat->bussiness_id,array('class'=>'form-control','required'=>'requiered')) }}  </div>
                </div>
             
             <div class='form-group'>
            {{ Form::label('applied', 'Applied Amount (in Tsh)',array('class'=>'control-label col-sm-3')) }}
            <div class='col-sm-9'>{{ Form::text('applied',$applicat->applied_amount,array("pattern"=>"\d*",'class'=>'form-control','placeholder'=>'Applied Amount','required'=>'required')) }} </div>
            </div>
             
             <div class='form-group'>
            {{ Form::label('collateral', 'Collateral',array('class'=>'control-label col-sm-3')) }}
            <div class='col-sm-9'>{{ Form::textarea('collateral',$applicat->collateral,array('class'=>'form-control','placeholder'=>'Assets For Loan','rows'=>'3')) }} </div>
            </div>
             
             <div class='form-group'>
            {{ Form::label('comments', 'Any Comments',array('class'=>'control-label col-sm-3')) }}
            <div class='col-sm-9'>{{ Form::textarea('comments',$applicat->comments,array('class'=>'form-control','placeholder'=>'Any Comments','rows'=>'3')) }} </div>
            </div>
        
          <div class='form-group text-center'>
            {{ Form::submit('Submit',array('class'=>'btn btn-primary','id'=>'submitqn')) }}
            {{ Form::reset('Reset',array('class'=>'btn btn-warning','id'=>'submitqn')) }}
            <a href="{{ url("applicant/application/{$applicat->id}") }}" class="btn btn-danger"><i class="fa fa-times"></i> Cancel</a>
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


