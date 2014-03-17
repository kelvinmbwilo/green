<?php
/**
 * Created by PhpStorm.
 * User: kelvin
 * Date: 2/5/14
 * Time: 10:58 AM
 */
//creating a list of loans from database
$parameter = CashParameter::where("status","active")->orderBy("created_at","desc")->get();
?>
@if($parameter->count() == 0)
<h2>No Parameters Defined Yet</h2>
@else
<ul class="list-group">
    @foreach($parameter as $param)
    <li class="list-group-item">

        <p class="list-group-item-text">
            name: {{ $param->name }}<span class="pull-right">{{ $param->for }} </span><br/>


        </p>
        <p id="{{ $param->id }}">
            <a href="#e" title="edit rule" class="editrule"><i class="fa fa-pencil text-info"></i> edit</a>&nbsp;&nbsp;&nbsp;
            <a href="#b" title="delete rule" class="deleterule"><i class="fa fa-trash-o text-danger"></i> delete</a>
        </p>
    </li>
    @endforeach
</ul>
@endif
<script>
    $(document).ready(function (){
        $(".editrule").click(function(){
            var id = $(this).parent().attr("id");
            var url= "<?php echo url("settings/cashflow/parameter/edit/") ?>/";
            url += id;
            $("#editll").show("")
            $("#editll").html("<i class='fa fa-spinner fa-spin fa-3x'></i>Loading Content...");
            $("#editll").load(url)
        })

        $(".deleterule").click(function(){
            var id = $(this).parent().attr("id");
            var url= "<?php echo url("settings/cashflow/parameter/delete") ?>/";
            url += id;
            $(".deleterule").show("slow").parent().parent().find("span").remove();
            var btn = $(this).parent().parent();
            $(this).hide("slow").parent().append("<span><br><b>Are You Sure you want to delete this parameter</b><br /> <a href='#s' id='yes' class='btn btn-success btn-xs'><i class='fa fa-check'></i> Yes</a> <a href='#s' id='no' class='btn btn-danger btn-xs'> <i class='fa fa-times'></i> No</a></span>");
            $("#no").click(function(){
                $(this).parent().parent().find(".deleterule").show("slow");
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