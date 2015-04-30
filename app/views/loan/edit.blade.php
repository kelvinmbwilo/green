<?php
/**
 * Created by PhpStorm.
 * User: kelvin
 * Date: 2/5/14
 * Time: 11:24 AM
 */
?>
<div id="editform">

{{ Form::open(array("url"=>url("loans/edit/{$loan->id}"),"class"=>"form-horizontal","id"=>"FileUploader")) }}
<h3>Edit Loan Information</h3>
<h4>Loan Information</h4>
<div class='form-group'>
    <div class='col-sm-6'>Loan Name (Identification)<br>{{ Form::text('name',$loan->name,array('class'=>'form-control','placeholder'=>'Loan Name','required'=>'required')) }} </div>
    <div class='col-sm-6'>Percent Profit<br>{{ Form::text('profit',$loan->profit,array("pattern"=>"\d*",'class'=>'form-control','placeholder'=>'Percent Profit (%)','required'=>'required')) }}</div>
</div>
<h4>Loan Amount</h4>
<div class='form-group'>
    <div class='col-sm-6'>Minimum Amount<br>{{ Form::text('minamount',$loan->minimum_amount,array("pattern"=>"\d*",'class'=>'form-control','placeholder'=>'Minimum Amount (Amount Tsh)','required'=>'required')) }}</div>
    <div class='col-sm-6'>Maximum Amount<br>{{ Form::text('maxamount',$loan->maximum_amount,array("pattern"=>"\d*",'class'=>'form-control','placeholder'=>'Maximum Amount  (Amount Tsh)','required'=>'required')) }} </div>
</div>
<h4>Loan Return Time</h4>
<div class='form-group'>
    <div class='col-sm-6'>Minimum time(Month)<br>{{ Form::text('mintime',$loan->minReturnTime,array("pattern"=>"\d*",'class'=>'form-control','placeholder'=>'Minimum time (Month)','required'=>'required')) }} </div>
    <div class='col-sm-6'>Maximum time(Month)<br>{{ Form::text('maxtime',$loan->MaxReturnTime,array("pattern"=>"\d*",'class'=>'form-control','placeholder'=>'Maximum time (Month)','required'=>'required')) }}</div>
</div>

<div class='form-group'>

    <div class="col-sm-12">Other Information <br>{{ Form::textarea('other',$loan->other,array('class'=>'form-control','placeholder'=>'Other Information eg allowed people(Optional)','rows'=>'3')) }} </div>
</div>
<div id="output1"></div>
<div class='form-group text-center'>
    {{ Form::submit('Update',array('class'=>'btn btn-primary','id'=>'submitqn')) }}
    {{ Form::button('Cancel',array('class'=>'btn btn-danger','id'=>'canceledit')) }}
</div>
{{ Form::close() }}

<script>
    $(document).ready(function (){
        $("#canceledit").click(function(){
            $("#editform").hide("slow");
        })

        $('#FileUploader').on('submit', function(e) {
            e.preventDefault();
            $("#output1").html("<h3><i class='fa fa-spin fa-spinner '></i><span>Making changes please wait...</span><h3>");
            $(this).ajaxSubmit({
                target: '#output1',
                success:  afterSuccess
            });

        });

        function afterSuccess(){
            $("#listloan").load("<?php echo url("loans/list") ?>")
            setTimeout(function() {
                $("#editform").hide("slow");
            }, 2500);
        }
    });
</script>
    </div>