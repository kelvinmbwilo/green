@extends('layout.master')

@section('breadcumbs')
    <li><a href="{{ url("home") }}">Home</a></li>
    <li class="active">applicants</li>
@stop
<?php
$all = $app->count();
$pending = Applicants::whereIn("id",array_merge(Applications::where("status","pending")->get()->lists("applicant_id"),array(0)))->get()->count();
$loan = Applicants::whereIn("id",array_merge(Applications::where("status","granted")->get()->lists("applicant_id"),array(0)))->get()->count();
$finished = Applicants::whereIn("id",array_merge(Applications::where("status","paid")->get()->lists("applicant_id"),array(0)))->get()->count();
$decline = Applicants::whereIn("id",array_merge(Applications::where("status","declined")->get()->lists("applicant_id"),array(0)))->get()->count();
?>
@section('content')
    <div class="panel panel-default">
      <div class="panel-body">
          <h2 class="text-center">Registered Loan Applicants </h2>
          <ul class="nav nav-tabs">
              <li class="active"><a href="#home" data-toggle="tab">All <span class="badge pull-right">{{ $all }}</span> </a></li>
              <li><a href="#profile" data-toggle="tab">With Pending Applications <span class="badge pull-right">{{ $pending }}</span></a></li>
              <li><a href="#messages" data-toggle="tab">With Loans <span class="badge pull-right">{{ $loan }}</span></a></li>
              <li><a href="#settings" data-toggle="tab">Finished Paying Loans <span class="badge pull-right">{{ $finished }}</span></a></li>
              <li><a href="#declined" data-toggle="tab">Declined Applications <span class="badge pull-right">{{ $decline }}</span></a></li>
          </ul>
          
          <div class="tab-content">
            <div class="tab-pane active" id="home">
          
          <table class='table table-striped table-responsive stafftale' id='stafftale' >
              <thead>
                  <tr>
                      <th> # </th>
                      <th> Name </th>
                      <th> gender </th>
                      <th> Age </th>
                      <th> Phone </th>
                      <th> Residense</th>
                      <th> Action </th>
                  </tr>
              </thead>
              <tbody>
                  <?php $i = 1; ?>
                  @foreach($app as $us)
                  <tr>
                      <td>{{ $i++ }}</td>
                       <td style="text-transform: capitalize">{{ $us->firstname }} {{ $us->middlename }} {{ $us->lastname }}</td>
                       <td>{{ $us->gender }}</td>
                       <td>{{ date("Y") - date("Y",strtotime($us->bitrhdate))  }}</td>
                       <td>{{ $us->phone }}</td>
                       <td>{{ $us->residense }}</td>
                       <td id="{{ $us->id }}}">
                            <a href="{{ url("applicant/{$us->id}")}}" title="View Applicants Information" class="edituser"><i class="fa fa-list text-success"></i> info</a>&nbsp;&nbsp;&nbsp;
                            <a href="{{ url("applicant/{$us->id}/add/application")}}" title="Add Loan Application" class="loanapp"><i class="fa fa-briefcase text-warning"></i> application</a>&nbsp;&nbsp;&nbsp;
                            <a href="{{ url("applicant/edit/{$us->id}")}}" title="edit Staff" class="edituser"><i class="fa fa-pencil text-info"></i> edit</a>&nbsp;&nbsp;&nbsp;
                            <a href="#b" title="delete Applicant" class="deleteapp"><i class="fa fa-trash-o text-danger"></i> delete</a>
                            @if($us->group()->count() != 0)
                            <span class="badge pull-right" title="{{ $us->group->group->name }}">Group member</span>
                            @endif
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
                      <th> Name </th>
                      <th> gender </th>
                      <th> Age </th>
                      <th> Phone </th>
                      <th> Residense</th>
                      <th> Action </th>
                  </tr>
              </thead>
              <tbody>
                  <?php $i = 1;
                  $appp =  Applicants::whereIn("id",array_merge(Applications::where("status","pending")->get()->lists("applicant_id"),array(0)))->get();
                  ?>
                  @foreach($appp as $us)
                  <tr>
                      <td>{{ $i++ }}</td>
                       <td style="text-transform: capitalize">{{ $us->firstname }} {{ $us->middlename }} {{ $us->lastname }}</td>
                       <td>{{ $us->gender }}</td>
                       <td>{{ date("Y") - date("Y",strtotime($us->bitrhdate))  }}</td>
                       <td>{{ $us->phone }}</td>
                       <td>{{ $us->residense }}</td>
                       <td id="{{ $us->id }}}">
                            <a href="{{ url("applicant/{$us->id}")}}" title="View Applicants Information" class="edituser"><i class="fa fa-list text-success"></i> info</a>&nbsp;&nbsp;&nbsp;
                            <a href="{{ url("applicant/{$us->id}/add/application")}}" title="Add Loan Application" class="loanapp"><i class="fa fa-briefcase text-warning"></i> application</a>&nbsp;&nbsp;&nbsp;
                            <a href="{{ url("applicant/edit/{$us->id}")}}" title="edit Staff" class="edituser"><i class="fa fa-pencil text-info"></i> edit</a>&nbsp;&nbsp;&nbsp;
                            <a href="#b" title="delete Applicant" class="deleteapp"><i class="fa fa-trash-o text-danger"></i> delete</a>
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
                          <th> Name </th>
                          <th> gender </th>
                          <th> Age </th>
                          <th> Phone </th>
                          <th> Residense</th>
                          <th> Action </th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php $i = 1;
                      $appp =  Applicants::whereIn("id",array_merge(Applications::where("status","granted")->get()->lists("applicant_id"),array(0)))->get();
                      ?>
                      @foreach($appp as $us)
                      <tr>
                          <td>{{ $i++ }}</td>
                          <td style="text-transform: capitalize">{{ $us->firstname }} {{ $us->middlename }} {{ $us->lastname }}</td>
                          <td>{{ $us->gender }}</td>
                          <td>{{ date("Y") - date("Y",strtotime($us->bitrhdate))  }}</td>
                          <td>{{ $us->phone }}</td>
                          <td>{{ $us->residense }}</td>
                          <td id="{{ $us->id }}}">
                              <a href="{{ url("applicant/{$us->id}")}}" title="View Applicants Information" class="edituser"><i class="fa fa-list text-success"></i> info</a>&nbsp;&nbsp;&nbsp;
                              <a href="{{ url("applicant/{$us->id}/add/application")}}" title="Add Loan Application" class="loanapp"><i class="fa fa-briefcase text-warning"></i> application</a>&nbsp;&nbsp;&nbsp;
                              <a href="{{ url("applicant/edit/{$us->id}")}}" title="edit Staff" class="edituser"><i class="fa fa-pencil text-info"></i> edit</a>&nbsp;&nbsp;&nbsp;
                              <a href="#b" title="delete Applicant" class="deleteapp"><i class="fa fa-trash-o text-danger"></i> delete</a>
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
                          <th> Name </th>
                          <th> gender </th>
                          <th> Age </th>
                          <th> Phone </th>
                          <th> Residense</th>
                          <th> Action </th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php $i = 1;
                     $appp =  Applicants::whereIn("id",array_merge(Applications::where("status","paid")->get()->lists("applicant_id"),array(0)))->get();
                      ?>
                      @foreach($appp as $us)
                      <tr>
                          <td>{{ $i++ }}</td>
                          <td style="text-transform: capitalize">{{ $us->firstname }} {{ $us->middlename }} {{ $us->lastname }}</td>
                          <td>{{ $us->gender }}</td>
                          <td>{{ date("Y") - date("Y",strtotime($us->bitrhdate))  }}</td>
                          <td>{{ $us->phone }}</td>
                          <td>{{ $us->residense }}</td>
                          <td id="{{ $us->id }}}">
                              <a href="{{ url("applicant/{$us->id}")}}" title="View Applicants Information" class="edituser"><i class="fa fa-list text-success"></i> info</a>&nbsp;&nbsp;&nbsp;
                              <a href="{{ url("applicant/{$us->id}/add/application")}}" title="Add Loan Application" class="loanapp"><i class="fa fa-briefcase text-warning"></i> application</a>&nbsp;&nbsp;&nbsp;
                              <a href="{{ url("applicant/edit/{$us->id}")}}" title="edit Staff" class="edituser"><i class="fa fa-pencil text-info"></i> edit</a>&nbsp;&nbsp;&nbsp;
                              <a href="#b" title="delete Applicant" class="deleteapp"><i class="fa fa-trash-o text-danger"></i> delete</a>
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
                          <th> Name </th>
                          <th> gender </th>
                          <th> Age </th>
                          <th> Phone </th>
                          <th> Residense</th>
                          <th> Action </th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php $i = 1;
                      $appp =  Applicants::whereIn("id",array_merge(Applications::where("status","declined")->get()->lists("applicant_id"),array(0)))->get();
                      ?>
                      @foreach($appp as $us)
                      <tr>
                          <td>{{ $i++ }}</td>
                          <td style="text-transform: capitalize">{{ $us->firstname }} {{ $us->middlename }} {{ $us->lastname }}</td>
                          <td>{{ $us->gender }}</td>
                          <td>{{ date("Y") - date("Y",strtotime($us->bitrhdate))  }}</td>
                          <td>{{ $us->phone }}</td>
                          <td>{{ $us->residense }}</td>
                          <td id="{{ $us->id }}}">
                              <a href="{{ url("applicant/{$us->id}")}}" title="View Applicants Information" class="edituser"><i class="fa fa-list text-success"></i> info</a>&nbsp;&nbsp;&nbsp;
                              <a href="{{ url("applicant/{$us->id}/add/application")}}" title="Add Loan Application" class="loanapp"><i class="fa fa-briefcase text-warning"></i> application</a>&nbsp;&nbsp;&nbsp;
                              <a href="{{ url("applicant/edit/{$us->id}")}}" title="edit Staff" class="edituser"><i class="fa fa-pencil text-info"></i> edit</a>&nbsp;&nbsp;&nbsp;
                              <a href="#b" title="delete Applicant" class="deleteapp"><i class="fa fa-trash-o text-danger"></i> delete</a>
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
