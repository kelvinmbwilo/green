<?php
/**
 * Created by PhpStorm.
 * User: kelvin
 * Date: 2/5/14
 * Time: 10:58 AM
 */
//creating a list of loans from database
$loans = Loans::orderBy("created_at","desc")->get();
?>
@if($loans->count() == 0)
<h2>No loans Types Defined Yet</h2>
@else
<ul class="list-group">
    @foreach($loans as $loan)
    <li class="list-group-item">
        <h4 class="list-group-item-heading">
            {{ $loan->name }}
        </h4>
        <div class="row">
            <div class="col-xs-4"><b>Amount</b></div>
            <div class="col-xs-4">Minimum<br> {{ $loan->minimum_amount }} Tsh</div>
            <div class="col-xs-4">Maximum<br> {{ $loan->maximum_amount }} Tsh</div>
        </div>
        <div class="row">
            <div class="col-xs-4"><b>Return Time</b></div>
            <div class="col-xs-4">Minimum<br> {{ $loan->minReturnTime }} Month(s)</div>
            <div class="col-xs-4">Maximum<br> {{ $loan->MaxReturnTime }} Month(s)</div>
        </div>
        <p><b>Percent Profit</b> {{ $loan->profit }}%</p>
        @if($loan->other != "")
        <p class="list-group-item-text">
            <b>Comments:</b> {{ $loan->other }}
        </p>
        @endif
        <p id="{{ $loan->id }}">
            <a href="#e" title="edit Loan" class="editloan"><i class="fa fa-pencil text-info"></i> edit</a>&nbsp;&nbsp;&nbsp;
            <a href="#b" title="delete Loan" class="deleteloan"><i class="fa fa-trash-o text-danger"></i> delete</a>
        </p>
    </li>
    @endforeach
</ul>
@endif
<script>
    $(document).ready(function (){
        $(".editloan").click(function(){
            var id = $(this).parent().attr("id");
            var url= "<?php echo url("loans/edit/") ?>/";
            url += id;
            $("#editll").html("<i class='fa fa-spinner fa-spin fa-3x'></i>Loading Content...");
            $("#editll").load(url)
        })

        $(".deleteloan").click(function(){
            var id = $(this).parent().attr("id");
            var url= "<?php echo url("loans/delete") ?>/";
            url += id;
            $(".deleteloan").show("slow").parent().parent().find("span").remove();
            var btn = $(this).parent().parent();
            $(this).hide("slow").parent().append("<span><br>Deleting a loan will delete all data associated with a loan <br><b>Are You Sure </b><br /> <a href='#s' id='yes' class='btn btn-success btn-xs'><i class='fa fa-check'></i> Yes</a> <a href='#s' id='no' class='btn btn-danger btn-xs'> <i class='fa fa-times'></i> No</a></span>");
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