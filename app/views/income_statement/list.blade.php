@if($app->balance()->count() == 0 )
<h3>No Balance sheet added</h3>
@else

<?php
  $year  = array();
  foreach($app->balance as $bal){
      if(in_array($bal->year,$year)){

      }else{
          $year[] = $bal->year;
      }
  }
?>
<div class="panel-group" id="accordion">
@foreach($year as $yea)


    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $yea }}">
                    Balance Sheet Year {{ $yea }} <a href="#d" id="{{ $yea }}" class="pull-right deleteflow"><i class="fa fa-trash-o text-danger"></i>  delete</a>
                </a>
            </h4>
        </div>
        <div id="collapse{{ $yea }}" class="panel-collapse collapse">
            <div class="panel-body">
                <table class="table table-responsive table-bordered">
                    <tr>
                        <th>Balance Sheet</th>
                        <th>Total</th>
                    </tr>

                    @foreach($app->balance()->where('year',$yea)->whereIn("parameter_id",array_merge(Parameters::where("flow","Current Asset")->lists("id"),array("0")))->get() as $param)
                    <tr>
                        <td>{{ $param->parameter->name }}</td>
                        <td>{{ $param->value }}</td>


                    </tr>
                    @endforeach
                    <tr class="active" style="font-weight: bolder">
                        <td>Total Current Asset</td><td>{{ $app->balance()->where("year",$yea)->whereIn("parameter_id",array_merge(Parameters::where("flow","Current Asset")->lists("id"),array("0")))->sum("value") }}</td>

                    </tr>
                    @foreach($app->balance()->where('year',$yea)->whereIn("parameter_id",array_merge(Parameters::where("flow","Non Current Asset")->lists("id"),array("0")))->get() as $param)
                    <tr>
                        <td>{{ $param->parameter->name }}</td>
                        <td>{{ $param->value }}</td>

                    </tr>
                    @endforeach
                    <tr class="active" style="font-weight: bolder">
                        <td>Total Non Current Asset</td> <td>{{ $app->balance()->where("year",$yea)->whereIn("parameter_id",array_merge(Parameters::where("flow","Non Current Asset")->lists("id"),array("0")))->sum("value") }}</td>

                    </tr>
                    <tr class="active" style="font-weight: bolder">
                        <td>Total Asset</td><td>{{ $app->balance()->where("year",$yea)->whereIn("parameter_id",array_merge(Parameters::where("flow","Current Asset")->orWhere("flow","Non Current Asset")->lists("id"),array("0")))->sum("value") }}</td>

                    </tr>

                    @foreach($app->balance()->where('year',$yea)->whereIn("parameter_id",array_merge(Parameters::where("flow","Non Current Liabilities")->lists("id"),array("0")))->get() as $param)
                    <tr>
                        <td>{{ $param->parameter->name }}</td>
                        <td>{{ $param->value }}</td>

                    </tr>
                    @endforeach

                    <tr class="active" style="font-weight: bolder">
                        <td>Total Non Current Liabilities</td>
                        <td>{{ $app->balance()->where("year",$yea)->whereIn("parameter_id",array_merge(Parameters::where("flow","Non Current Liabilities")->lists("id"),array("0")))->sum("value") }}</td>


                    </tr>

                    @foreach($app->balance()->where('year',$yea)->whereIn("parameter_id",array_merge(Parameters::where("flow","Current Liabilities")->lists("id"),array("0")))->get() as $param)
                    <tr>
                        <td>{{ $param->parameter->name }}</td>
                        <td>{{ $param->value }}</td>

                        </tr>
                    @endforeach
                    <tr class="active" style="font-weight: bolder">
                        <td>Total Current Liabilities</td>
                        <td>{{ $app->balance()->where("year",$yea)->whereIn("parameter_id",array_merge(Parameters::where("flow","Current Liabilities")->lists("id"),array("0")))->sum("value") }}</td>

                    </tr>
                    <tr class="active" style="font-weight: bolder">
                        <td>Total Liabilities</td>
                        <td>{{ $app->balance()->where("year",$yea)->whereIn("parameter_id",array_merge(Parameters::where("flow","Current Liabilities")->orWhere("flow","Non Current Liabilities")->lists("id"),array("0")))->sum("value") }}</td>

                    </tr>

                    @foreach($app->balance()->where('year',$yea)->whereIn("parameter_id",array_merge(Parameters::where("flow","Equity")->lists("id"),array("0")))->get() as $param)
                    <tr>
                        <td>{{ $param->parameter->name }}</td>
                        <td>{{ $param->value }}</td>

                    </tr>
                    @endforeach
                    <tr class="active" style="font-weight: bolder">
                        <td>Total Equity</td><td>{{ $app->balance()->where("year",$yea)->whereIn("parameter_id",array_merge(Parameters::where("flow","Equity")->lists("id"),array("0")))->sum("value") }}</td>

                    </tr>
                    <tr class="active" style="font-weight: bolder">
                        <td>Total Liabs And Equity</td><td>{{ $app->balance()->where("year",$yea)->whereIn("parameter_id",array_merge(Parameters::where("flow","Equity")->orWhere("flow","Current Liabilities")->orWhere("flow","Non Current Liabilities")->lists("id"),array("0")))->sum("value") }}</td>

                    </tr>

                </table>

            @include("balance_sheet.ratios")

            @include("balance_sheet.values")
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
                $.post("<?php echo url("applicant/{$app->id}/balance_sheet/delete") ?>/"+id,function(data){
                    btn.hide("slow").next("hr").hide("slow");
                });
            });
        });//endof deleting balance sheet

    });
</script>
@endif