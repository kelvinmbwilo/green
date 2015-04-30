@extends('layout.master')

@section('breadcumbs')
    <li><a href="{{ url('home') }}">Home</a></li>
    <li class="active">users</li>
@stop

@section('content')
    <div class="panel panel-default">
      <div class="panel-body">
          <table class='table table-striped table-responsive' id='stafftale' >
              <thead>
                  <tr>
                      <th> # </th>
                      <th> Name </th>
                      <th> Email </th>
                      <th> Phone </th>
                      <th> Role </th>
                      <th> Gender </th>
                      <th> Action </th>
                  </tr>
              </thead>
              <tbody>
                  <?php $i = 1; ?>
                  @foreach($user as $us)
                  @if($us->status == "active")
                  <tr>
                      <td>{{ $i++ }}</td>
                       <td style="text-transform: capitalize">{{ $us->firstname }} {{ $us->middlename }} {{ $us->lastname }}</td>
                       <td>{{ $us->email }}</td>
                       <td>{{ $us->phone }}</td>
                       <td>{{ $us->role }}</td>
                       <td>{{ $us->gender }}</td>
                       <td id="{{ $us->id }}}">
                           <a href="{{ url("user/log/{$us->id}")}}" title="View Staff log" class="edituser"><i class="fa fa-list text-success"></i> log</a>&nbsp;&nbsp;&nbsp;
                            <a href="{{ url("user/edit/{$us->id}")}}" title="edit Staff" class="edituser"><i class="fa fa-pencil text-info"></i> edit</a>&nbsp;&nbsp;&nbsp;
                            <a href="#b" title="delete Staff" class="deleteuser"><i class="fa fa-trash-o text-danger"></i> delete</a>
                       </td>
                  </tr>
                  @endif
                  @endforeach
              </tbody>
          </table>
    </div>
      </div>

<!--script to process the list of users-->
<script>
$(document).ready(function (){
    $("#stafftale").dataTable({
//            "bJQueryUI": true,
            "sPaginationType": "full_numbers",
           "fnDrawCallback": function( oSettings ) {
               $(".deleteuser").click(function(){
                var id1 = $(this).parent().attr('id');
                $(".deleteuser").show("slow").parent().parent().find("span").remove();
                var btn = $(this).parent().parent();
                $(this).hide("slow").parent().append("<span><br>Are You Sure <br /> <a href='#s' id='yes' class='btn btn-success btn-xs'><i class='fa fa-check'></i> Yes</a> <a href='#s' id='no' class='btn btn-danger btn-xs'> <i class='fa fa-times'></i> No</a></span>");
                $("#no").click(function(){
                    $(this).parent().parent().find(".deleteuser").show("slow");
                    $(this).parent().parent().find("span").remove();
                });
                $("#yes").click(function(){
                    $(this).parent().html("<br><i class='fa fa-spinner fa-spin'></i>deleting...");
                    $.post("user/delete/"+id1,function(data){
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