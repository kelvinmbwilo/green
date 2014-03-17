<div>
    @if($applicat->returns()->count() == 0 )
    <?
    $dat = date('Y-m-d');
    $amount = $applicat->granted->amount_per_return;
    ?>
    <h4>This is first payment</h4>
    @else
    <?php
    $ret = $applicat->returns()->orderBy("created_at","desc")->first();
    $dat = date("Y-m-d",strtotime($ret->return_date."+".$applicat->granted->interval." ".$applicat->granted->interval_type));
    $amount = $applicat->granted->amount_per_return + $ret->remaining;
    ?>
         <h4>Last Payment</h4>
         <div class="col-xs-4"> date: {{ date("j M Y",strtotime($ret->return_date)) }}</div>
         <div class="col-xs-4"> Amount to Pay: {{ $applicat->granted->amount_per_return }}</div>
         <div class="col-xs-4"> Amount Paid: {{ $ret->amount }}</div>
         <div class="col-xs-4"> Remaining: {{ $ret->remaining }}</div>
         <div class="col-xs-4">Balance: {{ $ret->balance }}</div>
    @endif
    {{ Form::open(array("url"=>url("group/loan/process/{$applicat->id}"),"class"=>"form-horizontal","id"=>"FileUploader2")) }}
    <div class="form-group">
        <div class='col-sm-6'>Loan Amount<br>{{ Form::text('return',$amount,array("pattern"=>"\d*",'class'=>'form-control','placeholder'=>'Returned Amount','required'=>'required')) }} </div>

        <div class='col-sm-6'>Savings<br>{{ Form::text('saving',$applicat->savings_per_return,array("pattern"=>"\d*",'class'=>'form-control','placeholder'=>'Returned Amount','required'=>'required')) }} </div>

        <div class='col-sm-6'>date<br>{{ Form::text('returndate',$dat,array('class'=>'form-control','placeholder'=>'Start Year','required'=>'required','id'=>'returndate')) }} </div>
     </div>
    <h3>Loan Distribution</h3>
    <div class="row">
        <div class="col-sm-6">
            <b>Name</b>
        </div>
        <div class="col-sm-3">
            <b>Loan Amount</b>
        </div>
        <div class="col-sm-3">
            <b>Savings</b>
        </div>

    </div>
    @foreach($applicat->group->memberes as $member)
    <div class="row" style="padding-bottom: 20px">
        <div class="col-sm-6">
            {{ $member->applicant->firstname }} {{ $member->applicant->middlename }} {{ $member->applicant->lastname }}
        </div>
        <div class="col-sm-3">
            <input name="returns{{ $member->applicant->id }}" type="text" class="form-control loans" value="{{ $applicat->granted->amount_per_return/$applicat->group->memberes()->count() }}">
        </div>
        <div class="col-sm-3">
            <input name="savings{{ $member->applicant->id }}" type="text" class="form-control saving" value="{{ $applicat->savings_per_return/$applicat->group->memberes()->count() }}" placeholder="savings">
        </div>
    </div>

    @endforeach
    <div id="output6"></div>
    <div class='form-group text-center'>
        {{ Form::submit('Submit',array('class'=>'btn btn-primary','id'=>'submitqn')) }}
        <a href="#b" class="btn btn-danger" id="cancelgrant"><i class="fa fa-times"></i> Cancel</a>
    </div>
    {{ Form::close() }}
  </div>

<script>
    $(document).ready(function (){
        $("#returndate").datepicker({
            changeMonth: true,
            changeYear: true,
            maxDate:+1,
            dateFormat:"yy-mm-dd"
        });

        $("input[name=saving]").change(function(){
            var no = parseInt(<?php echo $applicat->group->memberes()->count() ?>);
            var data = $(this).val();
            if(isInt(data)){
                $(".saving").val(data/no)
            }else{
                $(this).val()
                $(".saving").val(0)
            }
        });

        $("input[name=return]").change(function(){
            var no = parseInt(<?php echo $applicat->group->memberes()->count() ?>);
            var data = $(this).val();
            if(isInt(data)){
                $(".loans").val(data/no)
            }else{
                var amount = parseInt(<?php echo $amount ?>);
                $(this).val(amount)
                $(".loans").val(amount/no)


            }
        });

        $('#FileUploader2').on('submit', function(e) {
            e.preventDefault();
            $("#output6").html("<h3><i class='fa fa-spin fa-spinner '></i><span>Making changes please wait...</span><h3>");
            $(this).ajaxSubmit({
                target: '#output6',
                success:  afterSuccess2
            });

        });

        function afterSuccess2(){
            $("#pocesss").html("<h3><i class='fa fa-spin fa-spinner '></i><span>Loading contents...</span><h3>");
            $("#applinfo").load("<?php echo url("group/application/show/{$applicat->id}") ?>");
            $("#pocesss").load("<?php echo url("group/application/process/show/{$applicat->id}") ?>");
        }
    });

    function isInt(value) {
        return !isNaN(value) && parseInt(value) == value;
    }
</script>