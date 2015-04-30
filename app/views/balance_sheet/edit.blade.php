@extends('layout.master')

@section('breadcumbs')
<li><a href="{{ url('home') }}">Home</a></li>
<li><a href="{{ url("applicants") }}">applicants</a></li>
<li ><a href="{{ url("applicant/{$app->id}") }}">{{ $app->firstname." ".$app->middlename." ".$app->lastname; }}</a></li>
<li class="active">Balance Sheet</li>
@stop
@section('content')

{{ Form::open(array("url"=>url("applicant/{$app->id}/balance_sheet/add"),"class"=>"form-horizontal","id"=>"FileUploader")) }}
<table class="table table-responsive table-bordered">
    <tr>
        <th>Balance Sheet</th>
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
        <td colspan="14"><h4>Non Current Liabilities</h4></td>
    </tr>
    @foreach(Parameters::where("flow","Non Current Liabilities")->get() as $param)
    <tr>
        <td>{{ $param->name }}</td>
        <td><input type='text' name="jan{{ $param->id }}" class='form-control' value="{{ $app->balance()->where("year",$year)->where("parameter_id",$param->id)->first()->jan }}"></td>

        <td><input type='hidden' name="total{{ $param->id }}" class='form-control' value='0'><span>0</span></td>
    </tr>
    @endforeach
    <tr>
        <td colspan="14"><h4>Current Liabilities</h4></td>
    </tr>

    @foreach(Parameters::where("flow","Current Liabilities")->get() as $param)
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
        <td colspan="14"><h4>Current Asset</h4></td>
    </tr>
    @foreach(Parameters::where("flow","Current Asset")->get() as $param)
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
        <td colspan="14"><h4>Non Current Asset</h4></td>
    </tr>
    @foreach(Parameters::where("flow","Non Current Asset")->get() as $param)
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
        <td colspan="14"><h4>Equity</h4></td>
    </tr>
    @foreach(Parameters::where("flow","Equity")->get() as $param)
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

{{ Form::close() }}

<script>
    $(document).ready(function (){
        $("input[type=text]").change(function(){
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
            }, 3000);
            $("#listrules").load("<?php echo url("applicant/{$app->id}/balance_sheet/list") ?>")
        }

        function isInt(value) {
            return !isNaN(value) && parseInt(value) == value;
        }
    });
</script>

@stop