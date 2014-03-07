<table class='table table-striped table-responsive stafftale' id='stafftale' >
    <thead>
    <tr>
        <th> # </th>
        <th> Name </th>
        <th>  </th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1;
    $appp =  Applicants::whereNotIn("id",array_merge(GroupMembers::all()->lists("applicant_id"),array(0)))->get();
    ?>
    @foreach($appp as $us)
    <tr>
        <td>{{ $i++ }}</td>
        <td class="col-sm-8 text-muted" style="text-transform: capitalize">
            {{ $us->firstname }} {{ $us->middlename }} {{ $us->lastname }}
        </td>
        <td id="{{ $us->id }}">
            <a href="#b" id="{{ $group->id }}" title="assign to this group" class="assign btn btn-primary btn-xs"><i class="fa fa-plus"></i> Add</a>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
<script>
    $(document).ready(function (){
        $(".stafftale").dataTable({
//            "bJQueryUI": true,
            "sPaginationType": "full_numbers",
            "fnDrawCallback": function( oSettings ) {
                $(".assign").click(function(){
                    var id1 = $(this).parent().attr('id');
                    var id = $(this).attr("id");
                    $(".assign").show("slow").parent().parent().find("span").remove();
                    var btn = $(this).parent().parent();
                    $(this).hide("slow").parent().append("<span><br><b>Are You Sure </b><br /> <a href='#s' id='yes' class='btn btn-success btn-xs'><i class='fa fa-check'></i> Yes</a> <a href='#s' id='no' class='btn btn-danger btn-xs'> <i class='fa fa-times'></i> No</a></span>");
                    $("#no").click(function(){
                        $(this).parent().parent().find(".assign").show("slow");
                        $(this).parent().parent().find("span").remove();
                    });
                    $("#yes").click(function(){
                        $(this).parent().html("<br><i class='fa fa-spinner fa-spin'></i>Adding...");
                        $.post("<?php echo url("group/{$group->id}/add/list") ?>/"+id1,function(data){
                            $("#load").html("<h3><i class='fa fa-spin fa-spinner '></i><span>loading changes please wait...</span><h3>");
                            $("#listmember").load("<?php echo url("group/{$group->id}/member/list") ?>");
                            btn.hide("slow").next("hr").hide("slow");
                        });
                    });
                });
            }
        });
        $('input[type="text"]').addClass("form-control");
        $('select').addClass("form-control");


    });
</script>