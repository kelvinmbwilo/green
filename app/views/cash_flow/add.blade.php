{{ Form::open(array("url"=>url("applicant/{$app->id}/cashflow/add"),"class"=>"form-horizontal","id"=>"FileUploader")) }}
<div class="col-xs-3" style="margin-bottom: 10px">
    {{ Form::text('year','',array("pattern"=>"\d*",'class'=>'form-control','placeholder'=>'year','required'=>'required')) }}

</div><button type="button" class="btn btn-xs btn-info">check</button>
<div id="addbalance">
<table class="table table-responsive table-bordered">
    <tr>
        <th>Cash_flow</th>
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
    <tr>
        <td colspan="14"><h4>In Flow</h4></td>
    </tr>
    @foreach(CashParameter::where("status","active")->where("for","In Flow")->get() as $param)
    <tr>
        <td>{{ $param->name }}</td>
        <td><input type='text' name="jan{{ $param->id }}" class='form-control' value='0'></td>
        <td><input type='text' name="feb{{ $param->id }}" class='form-control' value='0'></td>
        <td><input type='text' name="mar{{ $param->id }}" class='form-control' value='0'></td>
        <td><input type='text' name="apr{{ $param->id }}" class='form-control' value='0'></td>
        <td><input type='text' name="may{{ $param->id }}" class='form-control' value='0'></td>
        <td><input type='text' name="jun{{ $param->id }}" class='form-control' value='0'></td>
        <td><input type='text' name="jul{{ $param->id }}" class='form-control' value='0'></td>
        <td><input type='text' name="aug{{ $param->id }}" class='form-control' value='0'></td>
        <td><input type='text' name="sep{{ $param->id }}" class='form-control' value='0'></td>
        <td><input type='text' name="oct{{ $param->id }}" class='form-control' value='0'></td>
        <td><input type='text' name="nov{{ $param->id }}" class='form-control' value='0'></td>
        <td><input type='text' name="dec{{ $param->id }}" class='form-control' value='0'></td>
        <td><input type='hidden' name="total{{ $param->id }}" class='form-control' value='0'><span>0</span></td>
    </tr>
    @endforeach
    <tr>
        <td colspan="14"><h4>Out Flow</h4></td>
    </tr>

    @foreach(CashParameter::where("status","active")->where("for","Out Flow")->get() as $param)
    <tr>
        <td>{{ $param->name }}</td>
        <td><input type='text' name="jan{{ $param->id }}" class='form-control' value='0'></td>
        <td><input type='text' name="feb{{ $param->id }}" class='form-control' value='0'></td>
        <td><input type='text' name="mar{{ $param->id }}" class='form-control' value='0'></td>
        <td><input type='text' name="apr{{ $param->id }}" class='form-control' value='0'></td>
        <td><input type='text' name="may{{ $param->id }}" class='form-control' value='0'></td>
        <td><input type='text' name="jun{{ $param->id }}" class='form-control' value='0'></td>
        <td><input type='text' name="jul{{ $param->id }}" class='form-control' value='0'></td>
        <td><input type='text' name="aug{{ $param->id }}" class='form-control' value='0'></td>
        <td><input type='text' name="sep{{ $param->id }}" class='form-control' value='0'></td>
        <td><input type='text' name="oct{{ $param->id }}" class='form-control' value='0'></td>
        <td><input type='text' name="nov{{ $param->id }}" class='form-control' value='0'></td>
        <td><input type='text' name="dec{{ $param->id }}" class='form-control' value='0'></td>
        <td><input type='hidden' name="total{{ $param->id }}" class='form-control' value='0'><span>0</span></td>
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
            $.post("<?php echo url("applicant/{$app->id}/cashflow/check") ?>/"+$(this).val(),function(data){
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
        $("table input[type=text]").change(function(){
            if(!isInt($(this).val()) ){
                $(this).val("0")
            }
            var sum=parseInt($(this).parent().parent().find("td:eq(12)").find("input").val())  +  parseInt($(this).parent().parent().find("td:eq(1)").find("input").val())  +  parseInt($(this).parent().parent().find("td:eq(2)").find("input").val());
            sum+=parseInt($(this).parent().parent().find("td:eq(3)").find("input").val())  +  parseInt($(this).parent().parent().find("td:eq(4)").find("input").val())  +  parseInt($(this).parent().parent().find("td:eq(5)").find("input").val());
            sum+=parseInt($(this).parent().parent().find("td:eq(6)").find("input").val())  +  parseInt($(this).parent().parent().find("td:eq(7)").find("input").val())  +  parseInt($(this).parent().parent().find("td:eq(8)").find("input").val());
            sum+=parseInt($(this).parent().parent().find("td:eq(9)").find("input").val())  +  parseInt($(this).parent().parent().find("td:eq(10)").find("input").val()) +  parseInt($(this).parent().parent().find("td:eq(11)").find("input").val());
            $(this).parent().parent().find("td:last span").html(sum);
            $(this).parent().parent().find("td:last").find("input").val(sum)
        });

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
            $("#editll").load("<?php echo url("applicant/{$app->id}/cashflow/list") ?>")

        }

        function isInt(value) {
            return !isNaN(value) && parseInt(value) == value;
        }
    });
</script>