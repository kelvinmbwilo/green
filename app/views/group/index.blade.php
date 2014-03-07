@extends('layout.master')

@section('breadcumbs')
<li><a href="{{ url("home") }}">Home</a></li>
<li class="active">groups</li>
@stop

@section('content')
<div class="panel panel-default">
<div class="panel-body">
<h2 class="text-center">Registered Groups </h2>
<ul class="nav nav-tabs">
    <li class="active"><a href="#home" data-toggle="tab">All</a></li>
    <li><a href="#profile" data-toggle="tab">With Pending Applications</a></li>
    <li><a href="#messages" data-toggle="tab">With Loans</a></li>
    <li><a href="#settings" data-toggle="tab">Finished Paying Loans</a></li>
    <li><a href="#declined" data-toggle="tab">Declined Applications</a></li>
</ul>

<div class="tab-content">
    <div class="tab-pane active" id="home">

        <table class='table table-striped table-responsive stafftale' id='stafftale' >
            <thead>
            <tr>
                <th> # </th>
                <th> Group Name </th>
                <th> Action </th>
            </tr>
            </thead>
            <tbody>
            <?php $i = 1; ?>
            @foreach($group as $us)
            <tr>
                <td>{{ $i++ }}</td>
                <td class="col-sm-8">{{ $us->name }}</td>
                <td id="{{ $us->id }}}">
                    <a href="{{ url("groups/{$us->id}")}}" title="View group Information" class="edituser"><i class="fa fa-list text-success"></i> info</a>&nbsp;&nbsp;&nbsp;
                    <a href="{{ url("groups/members/{$us->id}")}}" title="View group members" class="edituser"><i class="fa fa-users text-warning"></i> Members</a>&nbsp;&nbsp;&nbsp;
                    <a href="{{ url("group/{$us->id}/add/application")}}" title="Add Loan Application" class="loanapp"><i class="fa fa-briefcase text-warning"></i> application</a>&nbsp;&nbsp;&nbsp;
                    <a href="#b" title="delete Group" class="deleteapp"><i class="fa fa-trash-o text-danger"></i> delete</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <!--
    Applicants with pending application
    -->
    <div class="tab-pane fade" id="profile">
        <table class='table table-striped table-responsive stafftale' id='stafftale' >
            <thead>
            <tr>
                <th> # </th>
                <th> Group Name </th>
                <th> Action </th>
            </tr>
            </thead>
            <tbody>
            <?php $i = 1;
            $appp =  Groups::whereIn("id",array_merge(GroupApplication::where("status","pending")->get()->lists("group_id"),array(0)))->get();
            ?>
            @foreach($appp as $us)
            <tr>
                <td>{{ $i++ }}</td>
                <td class="col-sm-8">{{ $us->name }}</td>
                <td id="{{ $us->id }}}">
                    <a href="{{ url("groups/{$us->id}")}}" title="View group Information" class="edituser"><i class="fa fa-list text-success"></i> info</a>&nbsp;&nbsp;&nbsp;
                    <a href="{{ url("groups/members/{$us->id}")}}" title="View group members" class="edituser"><i class="fa fa-users text-warning"></i> Members</a>&nbsp;&nbsp;&nbsp;
                    <a href="{{ url("group/{$us->id}/add/application")}}" title="Add Loan Application" class="loanapp"><i class="fa fa-briefcase text-warning"></i> application</a>&nbsp;&nbsp;&nbsp;
                    <a href="#b" title="delete Group" class="deleteapp"><i class="fa fa-trash-o text-danger"></i> delete</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <!--
    Applicants with pending application
    -->
    <div class="tab-pane fade" id="messages">
        <table class='table table-striped table-responsive stafftale' id='stafftale' >
            <thead>
            <tr>
                <th> # </th>
                <th> Group Name </th>
                <th> Action </th>
            </tr>
            </thead>
            <tbody>
            <?php $i = 1;
            $appp =  Groups::whereIn("id",array_merge(GroupApplication::where("status","granted")->get()->lists("group_id"),array(0)))->get();
             ?>
            @foreach($appp as $us)
            <tr>
                <td>{{ $i++ }}</td>
                <td class="col-sm-8">{{ $us->name }}</td>
                <td id="{{ $us->id }}}">
                    <a href="{{ url("groups/{$us->id}")}}" title="View group Information" class="edituser"><i class="fa fa-list text-success"></i> info</a>&nbsp;&nbsp;&nbsp;
                    <a href="{{ url("groups/members/{$us->id}")}}" title="View group members" class="edituser"><i class="fa fa-users text-warning"></i> Members</a>&nbsp;&nbsp;&nbsp;
                    <a href="{{ url("group/{$us->id}/add/application")}}" title="Add Loan Application" class="loanapp"><i class="fa fa-briefcase text-warning"></i> application</a>&nbsp;&nbsp;&nbsp;
                    <a href="#b" title="delete Group" class="deleteapp"><i class="fa fa-trash-o text-danger"></i> delete</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="tab-pane fade" id="settings">
        <table class='table table-striped table-responsive stafftale' id='stafftale' >
            <thead>
            <tr>
                <th> # </th>
                <th> Group Name </th>
                <th> Action </th>
            </tr>
            </thead>
            <tbody>
            <?php $i = 1;
            $appp =  Groups::whereIn("id",array_merge(GroupApplication::where("status","paid")->get()->lists("group_id"),array(0)))->get();
            ?>
            @foreach($appp as $us)
            <tr>
                <td>{{ $i++ }}</td>
                <td class="col-sm-8">{{ $us->name }}</td>
                <td id="{{ $us->id }}}">
                    <a href="{{ url("groups/{$us->id}")}}" title="View group Information" class="edituser"><i class="fa fa-list text-success"></i> info</a>&nbsp;&nbsp;&nbsp;
                    <a href="{{ url("groups/members/{$us->id}")}}" title="View group members" class="edituser"><i class="fa fa-users text-warning"></i> Members</a>&nbsp;&nbsp;&nbsp;
                    <a href="{{ url("group/{$us->id}/add/application")}}" title="Add Loan Application" class="loanapp"><i class="fa fa-briefcase text-warning"></i> application</a>&nbsp;&nbsp;&nbsp;
                    <a href="#b" title="delete Group" class="deleteapp"><i class="fa fa-trash-o text-danger"></i> delete</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="tab-pane fade" id="declined">
        <table class='table table-striped table-responsive stafftale' id='stafftale' >
            <thead>
            <tr>
                <th> # </th>
                <th> Group Name </th>
                <th> Action </th>
            </tr>
            </thead>
            <tbody>
            <?php $i = 1;
            $appp =  Groups::whereIn("id",array_merge(GroupApplication::where("status","declined")->get()->lists("group_id"),array(0)))->get();
            ?>
            @foreach($appp as $us)
            <tr>
                <td>{{ $i++ }}</td>
                <td class="col-sm-8">{{ $us->name }}</td>
                <td id="{{ $us->id }}}">
                    <a href="{{ url("groups/{$us->id}")}}" title="View group Information" class="edituser"><i class="fa fa-list text-success"></i> info</a>&nbsp;&nbsp;&nbsp;
                    <a href="{{ url("groups/members/{$us->id}")}}" title="View group members" class="edituser"><i class="fa fa-users text-warning"></i> Members</a>&nbsp;&nbsp;&nbsp;
                    <a href="{{ url("group/{$us->id}/add/application")}}" title="Add Loan Application" class="loanapp"><i class="fa fa-briefcase text-warning"></i> application</a>&nbsp;&nbsp;&nbsp;
                    <a href="#b" title="delete Group" class="deleteapp"><i class="fa fa-trash-o text-danger"></i> delete</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</div>
</div>
</div>

<!--script to process the list of users-->
<script>
    $(document).ready(function (){
        $(".stafftale").dataTable({
//            "bJQueryUI": true,
            "sPaginationType": "full_numbers",
            "fnDrawCallback": function( oSettings ) {
                $(".deleteapp").click(function(){
                    var id1 = $(this).parent().attr('id');
                    $(".deleteapp").show("slow").parent().parent().find("span").remove();
                    var btn = $(this).parent().parent();
                    $(this).hide("slow").parent().append("<span><br>Deleting an applicant will delete all its associated data of bussness and applications <br><b>Are You Sure </b><br /> <a href='#s' id='yes' class='btn btn-success btn-xs'><i class='fa fa-check'></i> Yes</a> <a href='#s' id='no' class='btn btn-danger btn-xs'> <i class='fa fa-times'></i> No</a></span>");
                    $("#no").click(function(){
                        $(this).parent().parent().find(".deleteapp").show("slow");
                        $(this).parent().parent().find("span").remove();
                    });
                    $("#yes").click(function(){
                        $(this).parent().html("<br><i class='fa fa-spinner fa-spin'></i>deleting...");
                        $.post("applicant/delete/"+id1,function(data){
                            btn.hide("slow").next("hr").hide("slow");
                        });
                    });
                });//endof deleting category
            }
        });
        $('input[type="text"]').addClass("form-control");
        $('select').addClass("form-control");


    });
</script>
@stop
