<?php
$gsaving = 0;
foreach($group->memberes as $gmember){
    $sav = ($gmember->applicant->savings()->count() == 0)?0:$gmember->applicant->savings->amount;
    $gsaving += $sav;
}
?>
<h4>Members:{{ $group->memberes()->count() }}</h4>
<h4>Savings:{{ $gsaving }}</h4>
<ul class="list-group">
    @if($group->memberes()->count() == 0)
        <h2>No Members</h2>
    @else
    @foreach($group->memberes as $member)
        <li class="list-group-item">
            <div class="row">
                <div class="col-sm-6">
                    <b>Name</b>:<br>
                    {{ $member->applicant->firstname }} {{ $member->applicant->middlename }} {{ $member->applicant->lastname }}
                </div>

                <div class="col-sm-3">
                    <b>Gender:</b><br>
                    {{ $member->applicant->gender }}
                </div>
                <div class="col-sm-3">
                    <b>Marital Status:</b><br>
                    {{ $member->applicant->marital_status }}
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <b>Age:</b><br>
                    {{ $member->applicant->bitrhdate }}
                </div>
                <div class="col-sm-3">
                    <b>Residence:</b><br>
                    {{ $member->applicant->residense }}
                </div>
                <div class="col-sm-3">
                    <b>Phone:</b><br>
                    {{ $member->applicant->phone }}
                </div>
                <div class="col-sm-3">
                    <b>Address:</b><br>
                    {{ $member->applicant->postal_address }}
                </div>
            </div>
            <p id="{{ $member->applicant->id }}">
                <a href="{{ url("applicant/{$member->applicant->id}") }}" title="view member" ><i class="fa fa-th-large text-primary"></i> info</a>&nbsp;&nbsp;&nbsp;
                <a href="#e" title="edit member" class="editmember"><i class="fa fa-pencil text-info"></i> edit</a>&nbsp;&nbsp;&nbsp;
                <a href="#e" title="remove From Group" class="remove from group"><i class="fa fa-times-circle-o text-warning"></i> remove from group</a>&nbsp;&nbsp;&nbsp;
                <a href="#b" title="delete member" class="deleteloan"><i class="fa fa-trash-o text-danger"></i> delete</a>
                @if($member->applicant->savings()->count() == 0)
                    <a href="#b" title="member savings" class="savings pull-right"><i class="fa fa-money text-muted"></i> 0 savings</a>
                @else
                    <a href="#b" title="member savings" class="savings pull-right"><i class="fa fa-money text-muted"></i> {{ $member->applicant->savings->amount }} savings</a>
                @endif
            </p>
        </li>
    @endforeach
    @endif
</ul>
<script>
    $(document).ready(function (){
        $(".editmember").click(function(){
            var id = $(this).parent().attr("id");
            var url= "<?php echo url("group/{$group->id}/member/edit") ?>/";
            url += id;
            $("#editll").show();
            $("#editll").html("<i class='fa fa-spinner fa-spin fa-3x'></i>Loading Content...");
            $("#editll").load(url)
        })

        $(".savings").click(function(){
            var id = $(this).parent().attr("id");
            var url= "<?php echo url("group/{$group->id}/member/savings") ?>/";
            url += id;
            $("#editll").show();
            $("#editll").html("<i class='fa fa-spinner fa-spin fa-3x'></i>Loading Content...");
            $("#editll").load(url)
        })


        $(".remove").click(function(){
            var id = $(this).parent().attr("id");
            var url= "<?php echo url("group/member/remove") ?>/";
            url += id;
            $(".remove").show("slow").parent().parent().find("span").remove();
            var btn = $(this).parent().parent();
            $(this).hide("slow").parent().append("<span><br>Remove this member from group <br><b>Are You Sure </b><br /> <a href='#s' id='yes' class='btn btn-success btn-xs'><i class='fa fa-check'></i> Yes</a> <a href='#s' id='no' class='btn btn-danger btn-xs'> <i class='fa fa-times'></i> No</a></span>");
            $("#no").click(function(){
                $(this).parent().parent().find(".remove").show("slow");
                $(this).parent().parent().find("span").remove();
            });
            $("#yes").click(function(){
                $(this).parent().html("<br><i class='fa fa-spinner fa-spin'></i>removing...");
                $.post(url,function(){
                    btn.hide("slow");
                })
            });
        })

        $(".deleteloan").click(function(){
            var id = $(this).parent().attr("id");
            var url= "<?php echo url("applicant/delete") ?>/";
            url += id;
            $(".deleteloan").show("slow").parent().parent().find("span").remove();
            var btn = $(this).parent().parent();
            $(this).hide("slow").parent().append("<span><br>Deleting a applicant will delete all data associated with an applicant <br><b>Are You Sure </b><br /> <a href='#s' id='yes' class='btn btn-success btn-xs'><i class='fa fa-check'></i> Yes</a> <a href='#s' id='no' class='btn btn-danger btn-xs'> <i class='fa fa-times'></i> No</a></span>");
            $("#no").click(function(){
                $(this).parent().parent().find(".deleteloan").show("slow");
                $(this).parent().parent().find("span").remove();
            });
            $("#yes").click(function(){
                $(this).parent().html("<br><i class='fa fa-spinner fa-spin'></i>deleting...");
                $.post(url,function(){
                    btn.hide("slow");
                })
            });
        })
    });
</script>