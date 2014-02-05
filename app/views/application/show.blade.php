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
          
          @if(isset($msg))
         <div class="alert alert-success alert-dismissable" >
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>{{ $msg }}!</strong> 
          </div>
         @endif
          
          <ul class="list-group">
          <li class="list-group-item" style="line-height: 25px">
        <div class="row" style="padding: 5px;">
            <div class="col-md-5" style="border-right: solid 1px">
                  <h3>Applicaation Information<span class="pull-right"><b>{{ date("j M, Y",strtotime($applicat->created_at)) }}</b></span></h3>
            
                    Applicant:<b style="text-transform: capitalize">{{ $app->firstname." ".$app->middlename." ".$app->lastname; }}</b><br>
                    Status:<b>{{$applicat->status }}</b><br>
                    Applied Amount: Tsh <b>{{$applicat->applied_amount }}</b>/=<br>

                    @if($applicat->amount_granted != 0)
                    Granted Amount: <b><small>{{$applicat->amount_granted }}</small></b><br>
                    @endif

                    Bussiness: <b><small><a href="{{url("applicant/bussness/{$bus->id}") }}">{{$applicat->bussiness->discr }}</a></small></b><br>

                    Collateral: <b><small>{{$applicat->collateral }}</small></b><br>

                    @if($applicat->comments != "")
                    Comments: <b><small>{{$applicat->comments }}</small></b><br>
                    @endif
                    <a href="#b" class="btn btn-xs pull-right text-danger deleteapp"><i class="fa fa-trash-o "></i> delete</a>
                    <a href="{{url("applicant/edit/application/{$applicat->id}")}}" class="btn btn-xs pull-right"><i class="fa fa-pencil"></i> edit</a>
           
              </div>
              <div class="col-md-7">
                  <h3>Application Proccessing</h3>
              </div>
            </div>  
    </li>
    
    <!--Displaying bussnes information for the applied loan-->
    <li class="list-group-item" style="line-height: 20px">
        <div class="row">
            <div class="col-md-7 thumbnail">
           
                    <h3>Business</h3>
                    <h4>{{$applicat->bussiness->discr }}</h4>
                    @include("bussness.info")
             
            </div>
            <div class="col-md-5 ">
                <a href="{{url("applicant/add/application/sponsor/{$applicat->id}")}}" class="btn btn-xs pull-right btn-success"><i class="fa fa-plus"></i> add</a>
                <h3>Application Sponsors</h3>
                    <?php $i=1 ?>
                    @foreach($sponsor as $spo)
                    <a href="{{url("applicant/edit/application/sponsor/{$spo->id}")}}" class="btn btn-xs pull-right"><i class="fa fa-pencil"></i> edit</a>
                    <h4>Sponsor #{{$i++ }}</h4>
                    @include("application.sponser")
                    @endforeach
            </div>
        </div>
    </li>
   
       </ul>
    </div>
      </div>

<script>
$(document).ready(function (){
    $(".deleteapp").click(function(){
        var id1 = $(this).parent().attr('id');
        $(".deleteapp").show("slow").parent().parent().find("span").remove();
        var btn = $(this).parent().parent();
        $(this).hide("slow").parent().append("<span><br>Deleting an application will delete all its associated data of sponsors etc <br><b>Are You Sure </b><br /> <a href='#s' id='yes' class='btn btn-success btn-xs'><i class='fa fa-check'></i> Yes</a> <a href='#s' id='no' class='btn btn-danger btn-xs'> <i class='fa fa-times'></i> No</a></span>");
        $("#no").click(function(){
            $(this).parent().parent().find(".deleteapp").show("slow");
            $(this).parent().parent().find("span").remove();
        });
        $("#yes").click(function(){
            $(this).parent().html("<br><i class='fa fa-spinner fa-spin'></i>deleting...");
            window.location.assign("<?php echo url("/") ?>")
        });
    });//endof deleting category
});
</script>
@stop


