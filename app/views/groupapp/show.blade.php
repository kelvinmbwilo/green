@extends('layout.master')
<?php
$group = $applicat->group;
?>
@section('breadcumbs')
<li><a href="{{ url("home") }}">Home</a></li>
<li><a href="{{ url("groups") }}">groups</a></li>
<li ><a href="{{ url("groups/{$group->id}") }}">{{ $group->name }}</a></li>
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
                    <div class="col-md-5" style="border-right: solid 1px" id="applinfo">
                        @include("groupapp.info")
                    </div>
                    <div class="col-md-7">

                        <div class="" id="pocesss">
                            @include("groupapp.proccess")
                        </div>

                    </div>
                </div>
            </li>

            <!--Displaying bussnes information for the applied loan-->
            <li class="list-group-item" style="line-height: 20px">
                <div class="row">
                    <div class="col-md-12 thumbnail">
                        @include("groupapp.payment_table")
                    </div>
                    <div class="col-md-12 thumbnail">
                        @include("group.members")

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


