@extends('layout.master')

@section('breadcumbs')
    <li><a href="#">Home</a></li>
    <li><a href="{{ url("applicants") }}">applicants</a></li>
    <li ><a href="{{ url("applicant/{$app->id}") }}">{{ $app->firstname." ".$app->middlename." ".$app->lastname; }}</a></li>
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
         <h3 class="text-center">Applicant: <a href="{{ url("applicant/{$app->id}") }}">{{ $app->firstname." ".$app->middlename." ".$app->lastname; }}</a></h3>
         
         <!--displaying previous applications-->
          <div class="col-sm-5">
              <h3>Applications</h3>
              <ul class="list-group">
                  <?php $i=0; ?>
                  @if($app->application()->get()->count() == 0)
                  <li class="list-group-item" style="line-height: 25px">
                      <h2 class="text-info"><i class="fa fa-exclamation"></i> Info</h2>
                    <h4>There are no application for this applicant</h4>
                  </li>
                  @endif
                  @foreach($app->application()->get() as $applicat)
                  <li class="list-group-item" style="line-height: 25px">
                      <div class="row" style="padding: 5px;">
                          Application #{{++$i }}
                          <span class="pull-right"><b>{{ date("j M, Y",strtotime($applicat->created_at)) }}</b></span>
                      </div>
                      Status:<b>{{$applicat->status }}</b><br>
                     Applied amount: Tsh <b>{{$applicat->applied_amount }}</b>/=<br>
                     Bussiness: <b><small>{{$applicat->bussiness->discr }}</small></b><br>
                     @if($applicat->comments != "")
                     Comments: <b><small>{{$applicat->comments }}</small></b><br>
                     @endif
                  </li>
                  @endforeach
              </ul>
          </div>
         
          <div class="col-sm-7">
               <h3>Application Form</h3>
              <div class="thumbnail">
              {{ Form::open(array("url"=>route('addapplicaion1'),"class"=>"form-horizontal")) }}
         
        
        
        @if(Busssiness::where("apllicant_id",$app->id)->get()->count() == 0)
        <a href="{{ url("applicant/{$app->id}/add/bussness") }}" class="btn btn-warning btn-block btn-lg"><i class="fa fa-plus-square-o"></i> Add a bussness first</a>
        @else
        @if($app->application()->where("status","pending")->get()->count() != 0)
        <h2 class="text-info"><i class="fa fa-exclamation"></i> Info</h2>
        <h4>You can not add application for this Applicant, he/she have already applied for a loan, The Application may either be processed or the applicant has an unpaid Loan</h4>
        @else
             <input type="hidden" value="{{ $app->id }}" name='id'>
             @if(isset($bus))
                <h3 class="text-center">Business: <a href="{{ url("applicant/bussness/{$bus->id}") }}">{{ $bus->discr; }}</a></h3>
                <input type="hidden" value="{{ $bus->id }}" name='business'>
             @else
             
             <div class='form-group'>
                    {{ Form::label('business', 'Busines',array('class'=>'control-label col-sm-3')) }}
                    <div class='col-sm-9'>{{ Form::select('business',Busssiness::where("apllicant_id",$app->id)->lists("discr","id"),'',array('class'=>'form-control','required'=>'requiered')) }}  </div>
                </div>
             @endif
             
             <div class='form-group'>
            {{ Form::label('applied', 'Applied Amount (in Tsh)',array('class'=>'control-label col-sm-3')) }}
            <div class='col-sm-9'>{{ Form::text('applied','',array("pattern"=>"\d*",'class'=>'form-control','placeholder'=>'Applied Amount','required'=>'required')) }} </div>
            </div>
             
             <div class='form-group'>
            {{ Form::label('comments', 'Any Comments',array('class'=>'control-label col-sm-3')) }}
            <div class='col-sm-9'>{{ Form::textarea('comments','',array('class'=>'form-control','placeholder'=>'Any Comments')) }} </div>
            </div>

       <div class='col-sm-12 form-group text-center'>
            {{ Form::submit('Register',array('class'=>'btn btn-primary','id'=>'submitqn')) }}
            {{ Form::reset('Reset',array('class'=>'btn btn-warning','id'=>'submitqn')) }}
            <a href="{{ url("applicant/{$app->id}") }}" class="btn btn-danger"><i class="fa fa-times"></i> Cancel</a>
        </div>
        @endif <!-- ending the if to check if the user is vaiable to take a loan-->
       @endif
      {{ Form::close() }}
      </div>
      </div>
    </div>
      </div>

<script>
$(document).ready(function (){
    
});
</script>
@stop