<?php
$amount_to  = "";
$amount_per = "";
$profit = "";
$dur ="";
foreach(Loans::all() as $loan){
    if(in_array($applicat->applied_amount,range($loan->minimum_amount,$loan->maximum_amount))){
        $profit = $loan->profit;
        $amount_to = $applicat->applied_amount +($applicat->applied_amount *($profit/100));
        $amount_per = $amount_to /($loan->MaxReturnTime*4);
        $dur = $loan->MaxReturnTime-1;
    }
}
?>

{{ Form::open(array("url"=>url("application/grant/{$applicat->id}"),"class"=>"form-horizontal","id"=>"FileUploader")) }}
<h3>Grant Loan <span class="pull-right" style="text-transform: capitalize">Applicant:{{ $applicat->applicant->firstname." ".$applicat->applicant->middlename." ".$applicat->applicant->lastname;  }}</span></h3>
<input type="hidden" value="{{ $applicat->bussiness->id }}" name="business" />
<input type="hidden" value="{{ $applicat->applicant->id }}" name="applicant">
<input type="hidden" value="{{ $applicat->id }}" name="application">
<div id="errorarea"></div>
<div class='form-group'>
    <div class='col-sm-6'>Amount Granted<br>{{ Form::text('granted',$applicat->applied_amount,array('class'=>'form-control','placeholder'=>'Amount Granted','required'=>'required','id'=>'granted')) }} </div>
    <div class='col-sm-6'>Profit Percent<br>{{ Form::text('profit',$profit,array('class'=>'form-control','placeholder'=>'Profit','required'=>'required',"id"=>"profit")) }} </div>
 </div>
<div class='form-group'>
    <div class='col-sm-6'>Loan Duration(month(s))<br>{{ Form::select('loan_duration',range(1,25),$dur,array('class'=>'form-control','required'=>'required')) }}</div>
    <div class='col-sm-6'>Payment Start at<br>{{ Form::text('start','',array('class'=>'form-control','placeholder'=>'Start Date','required'=>'required','id'=>'Birth_Date')) }} </div>
</div>
<div class='form-group'>
     <div class='col-sm-6'>Payment Duration<br>{{ Form::select('duration',range(1,25),'',array('class'=>'form-control','required'=>'required')) }}</div>
     <div class='col-sm-6'>Duration type<br>{{ Form::select('duration_type',array("day"=>"Day","week"=>"Week","month"=>"Month","Year"=>"Year"),'week',array('class'=>'form-control','required'=>'required',"id"=>"durationtype")) }}</div>
</div>
<div class='form-group'>
    <div class='col-sm-6'>Amount To Return<br>{{ Form::text('return',$amount_to,array('class'=>'form-control','placeholder'=>'Amount To Return','required'=>'required',"id"=>"return")) }} </div>
    <div class='col-sm-6'>Amount Per Return<br>{{ Form::text('per_return',$amount_per,array('class'=>'form-control','placeholder'=>'Amount Granted','required'=>'required',"id"=>"per_return")) }} </div>
</div>


<div id="output"></div>
<div class='form-group text-center'>
    {{ Form::submit('Submit',array('class'=>'btn btn-primary','id'=>'submitqn')) }}
    <a href="#b" class="btn btn-danger" id="cancelgrant"><i class="fa fa-times"></i> Cancel</a>
</div>
    <h3 id="output"></h3>
{{ Form::close() }}

<script>
    $(document).ready(function (){
        //setting a date picker for a form
        $("#Birth_Date").datepicker({
            changeMonth: true,
            changeYear: true,
            minDate: 1,
            dateFormat:"yy-mm-dd"
        });

        //canceling granting of loan
        $("#cancelgrant").click(function(){
            $(this).html("<i class='fa fa-spin fa-spinner '></i><span>Making changes please wait...</span>");
            $("#applinfo").load("<?php echo url("application/show/{$applicat->id}") ?>");
            $("#pocesss").load("<?php echo url("application/process/show/{$applicat->id}") ?>");
        })

        //changing payment duration
        $("select[name=duration]").change(function(){
            checkintegrity.call(this);
        })

        //changing duration type
        $("#durationtype").change(function(){
            checkintegrity.call(this);
        })

        //changing Loan duration
        $("select[name=loan_duration]").change(function(){
            checkintegrity.call(this);
        })

        //changing duration type

        $("#granted").change(function(){
            checkintegrity.call(this);

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
            $("#pocesss").html("<h3><i class='fa fa-spin fa-spinner '></i><span>Loading contents...</span><h3>");
            $("#applinfo").load("<?php echo url("application/show/{$applicat->id}") ?>");
            $("#pocesss").load("<?php echo url("application/process/show/{$applicat->id}") ?>");
        }

        function checkintegrity() {
            if ($.isNumeric($("#granted").val())) {
                $.post("<?php echo url("application/checkgranted") ?>/"+$("#granted").val()+"/"+$("select[name=duration]").val()+"/"+$("select[name=duration_type]").val()+"/"+$("select[name=loan_duration]").val(), function(data){
                    var obj  = JSON.parse(data);
                    if(obj.errors){
                        $("#errorarea").html("<h4 class='text-center text-danger'>"+obj.errors+"</h4>");
                    }else{
                        $("#errorarea").html("");
                        $("#per_return").val(obj.amount_per);
                        $("#return").val(obj.amount_to);
                        $("#profit").val(obj.profit);
                    }

                })
            } else {
                $(this).focus();
            }
        }

    });
</script>