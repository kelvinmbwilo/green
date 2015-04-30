@if($app->cashflow()->count() == 0 )
  <h3>No Cash Flow added</h3>
@else

<?php
$year  = array();
foreach($app->cashflow as $bal){
    if(in_array($bal->year,$year)){

    }else{
        $year[] = $bal->year;
    }
}
?>
<div class="panel-group" id="accordion">
<span class="help-block">Amounts in Tanzania Shillings</span>
@foreach($year as $yea)


<div class="panel panel-primary">
<div class="panel-heading">
    <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $yea }}" id="{{ $app->id }}">
            Cash Flow Year {{ $yea }} <a href="#d" id="{{ $yea }}" class="pull-right deleteflow"><i class="fa fa-trash-o text-danger"></i>  delete</a>
        </a>
    </h4>
</div>
<div id="collapse{{ $yea }}" class="panel-collapse collapse">
<div class="panel-body">
<table class="table table-responsive table-bordered">
<tr>
    <th>Cash Flow</th>
    <th>Jan</th>
    <th>Feb</th>
    <th>Mar</th>
    <th>Apr</th>
    <th>May</th>
    <th>Jun</th>
    <th>Jul</th>
    <th>Aug</th>
    <th>Sep</th>
    <th>Oct</th>
    <th>Nov</th>
    <th>Dec</th>
    <th>Total</th>
</tr>
<!--inflow-->
@foreach($app->cashflow()->where('year',$yea)->whereIn("parameter_id",array_merge(CashParameter::where("for","In Flow")->lists("id"),array("0")))->get() as $param)
<tr>
    <td>{{ $param->parameter->name }}</td>
    <td>{{ $param->jan }}</td>
    <td>{{ $param->feb }}</td>
    <td>{{ $param->mar }}</td>
    <td>{{ $param->apr }}</td>
    <td>{{ $param->may }}</td>
    <td>{{ $param->jun }}</td>
    <td>{{ $param->jul }}</td>
    <td>{{ $param->aug }}</td>
    <td>{{ $param->sep }}</td>
    <td>{{ $param->oct }}</td>
    <td>{{ $param->nov }}</td>
    <td>{{ $param->dec }}</td>
    <td>{{ $param->total }}</td>

</tr>
@endforeach
    <?php
    $flow = $app->cashflow()->where("year",$yea)->whereIn("parameter_id",array_merge(CashParameter::where("for","In Flow")->lists("id"),array("0")));
    ?>
<tr class="active" style="font-weight: bolder">
    <td>Total In Flow</td>
    <td>{{ $flow->sum("jan") }}</td>
    <td>{{ $flow->sum("feb") }}</td>
    <td>{{ $flow->sum("mar") }}</td>
    <td>{{ $flow->sum("apr") }}</td>
    <td>{{ $flow->sum("may") }}</td>
    <td>{{ $flow->sum("jun") }}</td>
    <td>{{ $flow->sum("jul") }}</td>
    <td>{{ $flow->sum("aug") }}</td>
    <td>{{ $flow->sum("sep") }}</td>
    <td>{{ $flow->sum("oct") }}</td>
    <td>{{ $flow->sum("nov") }}</td>
    <td>{{ $flow->sum("dec") }}</td>
    <td>{{ $flow->sum("total") }}</td>

</tr>

<!--   outflow-->
    @foreach($app->cashflow()->where('year',$yea)->whereIn("parameter_id",array_merge(CashParameter::where("for","Out Flow")->lists("id"),array("0")))->get() as $param)
    <tr>
        <td>{{ $param->parameter->name }}</td>
        <td>{{ $param->jan }}</td>
        <td>{{ $param->feb }}</td>
        <td>{{ $param->mar }}</td>
        <td>{{ $param->apr }}</td>
        <td>{{ $param->may }}</td>
        <td>{{ $param->jun }}</td>
        <td>{{ $param->jul }}</td>
        <td>{{ $param->aug }}</td>
        <td>{{ $param->sep }}</td>
        <td>{{ $param->oct }}</td>
        <td>{{ $param->nov }}</td>
        <td>{{ $param->dec }}</td>
        <td>{{ $param->total }}</td>

    </tr>
    @endforeach
    <?php
    $flow1 = $app->cashflow()->where("year",$yea)->whereIn("parameter_id",array_merge(CashParameter::where("for","Out Flow")->lists("id"),array("0")));
    ?>
    <tr class="active" style="font-weight: bolder">
        <td>Total Out Flow</td>
        <td>{{ $flow1->sum("jan") }}</td>
        <td>{{ $flow1->sum("feb") }}</td>
        <td>{{ $flow1->sum("mar") }}</td>
        <td>{{ $flow1->sum("apr") }}</td>
        <td>{{ $flow1->sum("may") }}</td>
        <td>{{ $flow1->sum("jun") }}</td>
        <td>{{ $flow1->sum("jul") }}</td>
        <td>{{ $flow1->sum("aug") }}</td>
        <td>{{ $flow1->sum("sep") }}</td>
        <td>{{ $flow1->sum("oct") }}</td>
        <td>{{ $flow1->sum("nov") }}</td>
        <td>{{ $flow1->sum("dec") }}</td>
        <td>{{ $flow1->sum("total") }}</td>

    </tr>

    <tr class="active" style="font-weight: bolder">
        <td>Net Cash Flow</td>
        <td>{{ $flow->sum("jan") - $flow1->sum("jan") }}</td>
        <td>{{ $flow->sum("feb") - $flow1->sum("feb")}}</td>
        <td>{{ $flow->sum("mar") - $flow1->sum("mar")}}</td>
        <td>{{ $flow->sum("apr") - $flow1->sum("apr")}}</td>
        <td>{{ $flow->sum("may") - $flow1->sum("may")}}</td>
        <td>{{ $flow->sum("jun") - $flow1->sum("jun")}}</td>
        <td>{{ $flow->sum("jul") - $flow1->sum("jul")}}</td>
        <td>{{ $flow->sum("aug") - $flow1->sum("aug")}}</td>
        <td>{{ $flow->sum("sep") - $flow1->sum("sep")}}</td>
        <td>{{ $flow->sum("oct") - $flow1->sum("oct")}}</td>
        <td>{{ $flow->sum("nov") - $flow1->sum("nov")}}</td>
        <td>{{ $flow->sum("dec") - $flow1->sum("dec")}}</td>
        <td>{{ $flow->sum("total") - $flow1->sum("total")}}</td>

    </tr>

</table>

</div>
</div>
</div>
@endforeach
</div>
<script>
    $(document).ready(function (){

        $(".deleteflow").click(function(){
            var id1 = $(this).parent().attr('id');
            var id = $(this).attr("id");
            $(".deleteflow").show("slow").parent().parent().find("span").remove();
            var btn = $(this).parent().parent().parent();
            $(this).hide("slow").parent().append("<span><br><b>Are You Sure </b><br /> <a href='#s' id='yes' class='btn btn-success btn-xs'><i class='fa fa-check'></i> Yes</a> <a href='#s' id='no' class='btn btn-danger btn-xs'> <i class='fa fa-times'></i> No</a></span>");
            $("#no").click(function(){
                $(this).parent().parent().find(".deleteflow").show("slow");
                $(this).parent().parent().find("span").remove();
            });
            $("#yes").click(function(){
                $(this).parent().html("<br><i class='fa fa-spinner fa-spin'></i>deleting...");
                $.post("<?php echo url("applicant/{$app->id}/cashflow/delete") ?>/"+id,function(data){
                    btn.hide("slow").next("hr").hide("slow");
                });
            });
        });//endof deleting category

    });
</script>
@endif