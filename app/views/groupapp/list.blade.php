<ul class="list-group" id="listapp">
    <?php $i=0; ?>
    @if($group->applications()->count() == 0)
    <li class="list-group-item" style="line-height: 25px">
        <h2 class="text-info"><i class="fa fa-exclamation"></i> Info</h2>
        <h4>There are no application for this group</h4>
    </li>
    @endif
    @foreach($group->applications as $applicat)
    <li class="list-group-item" style="line-height: 25px" id="{{ $applicat->id }}">
        <div class="row" style="padding: 5px;">
            Application #{{++$i }}
            <span class="pull-right"><b>{{ date("j M, Y",strtotime($applicat->created_at)) }}</b></span>
        </div>
        Status:<b>{{$applicat->status }}</b><br>
        Applied amount: Tsh <b>{{$applicat->applied_amount }}</b>/=<br>
        Savings per Return: Tsh <b>{{$applicat->savings_per_return }}</b>/=<br>
        @if($applicat->comments != "")
        Comments: <b><small>{{$applicat->comments }}</small></b><br>
        @endif
        <a href="{{url("group/application/{$applicat->id}")}}" class="btn btn-xs"><i class="fa fa-th-large"></i> More Info</a>
        @if($applicat->status == "pending")
        <a href="#b" class="btn btn-xs pull-right text-danger deleteapp"><i class="fa fa-trash-o "></i> delete</a>
        <a href="#" class="btn btn-xs pull-right editapp" ><i class="fa fa-pencil"></i> edit</a>
        @endif
        </li>
    @endforeach
</ul>
<script>
    $(document).ready(function (){
        $(".editapp").click(function(){
            var id = $(this).parent().attr("id");
            var url= "<?php echo url("group/application/edit/") ?>/";
            url += id;
            $("#editll").html("<i class='fa fa-spinner fa-spin fa-3x'></i>Loading Content...");
            $("#editll").load(url)
        })

        $(".deleteapp").click(function(){
            var id = $(this).parent().attr("id");
            var url= "<?php echo url("group/application/delete") ?>/";
            url += id;
            $(".deleteapp").show("slow").parent().parent().find("span").remove();
            var btn = $(this).parent();
            $(this).hide("slow").parent().append("<span><br><b>Are You Sure you want to delete this application</b><br /> <a href='#s' id='yes' class='btn btn-success btn-xs'><i class='fa fa-check'></i> Yes</a> <a href='#s' id='no' class='btn btn-danger btn-xs'> <i class='fa fa-times'></i> No</a></span>");
            $("#no").click(function(){
                $(this).parent().parent().find(".deleteapp").show("slow");
                $(this).parent().parent().find("span").remove();
            });
            $("#yes").click(function(){
                $(this).parent().html("<br><i class='fa fa-spinner fa-spin'></i>deleting...");
                $.post(url,function(){
                    var url= "<?php echo url("group/application/add/{$group->id}") ?>";
                    $("#editll").load(url)
                    btn.hide("slow");
                })
            });
        })
    });
</script>