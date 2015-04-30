{{ Form::open(array("url"=>url("applicant/{$app->id}/balance_sheet/add"),"class"=>"form-horizontal","id"=>"FileUploader")) }}
<div class="col-xs-3" style="margin-bottom: 10px">
    {{ Form::text('year','',array("pattern"=>"\d*",'class'=>'form-control','placeholder'=>'year','required'=>'required')) }}

</div><button type="button" class="btn btn-xs btn-info">check</button>
<div id="addbalance">
<table class="table table-responsive table-bordered" >

    <tr>
        <td colspan="14"><h4>Non Current Liabilities</h4></td>
    </tr>
    @foreach(Parameters::where("flow","Non Current Liabilities")->get() as $param)
    <tr>
    <td>{{ $param->name }}</td>
        <td>{{ Form::text("total{$param->id}",'0',array("pattern"=>"\d*",'class'=>'form-control','placeholder'=>'year','required'=>'required')) }}</td>
    </tr>
    @endforeach
    <tr>
        <td colspan="14"><h4>Current Liabilities</h4></td>
    </tr>

    @foreach(Parameters::where("flow","Current Liabilities")->get() as $param)
    <tr>
        <td>{{ $param->name }}</td>
        <td>{{ Form::text("total{$param->id}",'0',array("pattern"=>"\d*",'class'=>'form-control','placeholder'=>'year','required'=>'required')) }}</td>
    </tr>
    @endforeach
    <tr>
        <td colspan="14"><h4>Current Asset</h4></td>
    </tr>
    @foreach(Parameters::where("flow","Current Asset")->get() as $param)
    <tr>
        <td>{{ $param->name }}</td>
        <td>{{ Form::text("total{$param->id}",'0',array("pattern"=>"\d*",'class'=>'form-control','placeholder'=>'year','required'=>'required')) }}</td>
    </tr>
    @endforeach
    <tr>
        <td colspan="14"><h4>Non Current Asset</h4></td>
    </tr>
    @foreach(Parameters::where("flow","Non Current Asset")->get() as $param)
    <tr>
        <td>{{ $param->name }}</td>
        <td>{{ Form::text("total{$param->id}",'0',array("pattern"=>"\d*",'class'=>'form-control','placeholder'=>'year','required'=>'required')) }}</td>
    </tr>
    @endforeach
    <tr>
        <td colspan="14"><h4>Equity</h4></td>
    </tr>
    @foreach(Parameters::where("flow","Equity")->get() as $param)
    <tr>
        <td>{{ $param->name }}</td>
        <td>{{ Form::text("total{$param->id}",'0',array("pattern"=>"\d*",'class'=>'form-control','placeholder'=>'year','required'=>'required')) }}</td>
    </tr>
    @endforeach

</table>
<div id="output"></div>
<div class='form-group text-center'>
    {{ Form::submit('Add',array('class'=>'btn btn-primary','id'=>'submitqn')) }}
    {{ Form::reset('Reset',array('class'=>'btn btn-warning','id'=>'submitqn')) }}
</div>
</div>
{{ Form::close() }}

<script>
    $(document).ready(function (){
        $("#addbalance").hide();
        $("input[name=year").change(function(){
            $.post("<?php echo url("applicant/{$app->id}/balance_sheet/check") ?>/"+$(this).val(),function(data){
                if(data == "ok"){
                    $("h4.text-danger").remove()
                    $("#addbalance").show("slow");
                }else{
                    $("h4.text-danger").remove()
                    $("#addbalance").hide("hide");
                    $("input[name=year").parent().append("<h4 class='text-danger'>Balance sheet for this year already existed</h4> ")
                }
            })
        })
        $('#FileUploader').on('submit', function(e) {
            e.preventDefault();
            $("#output").html("<h3><i class='fa fa-spin fa-spinner '></i><span>Making changes please wait...</span><h3>");
            $(this).ajaxSubmit({
                target: '#output',
                success:  afterSuccess
            });

        });

        function afterSuccess(){
            $('#FileUploader').resetForm();
            setTimeout(function() {
                $("#output").html("");
                $("#listrules").html(" ");
            }, 3000);
            $("#editll").load("<?php echo url("applicant/{$app->id}/balance_sheet/list") ?>")

        }

        function isInt(value) {
            return !isNaN(value) && parseInt(value) == value;
        }
    });
</script>