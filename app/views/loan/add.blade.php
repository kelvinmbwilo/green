
          {{ Form::open(array("url"=>url("loans/add"),"class"=>"form-horizontal","id"=>"FileUploader")) }}
          <h4>Loan Information</h4>
          <div class='form-group'>
              <div class='col-sm-6'>Loan Name (Identification)<br>{{ Form::text('name','',array('class'=>'form-control','placeholder'=>'Loan Name','required'=>'required')) }} </div>
              <div class='col-sm-6'>Percent Profit<br>{{ Form::text('profit','',array("pattern"=>"\d*",'class'=>'form-control','placeholder'=>'Percent Profit (%)','required'=>'required')) }}</div>
          </div>
          <h4>Loan Amount</h4>
          <div class='form-group'>
              <div class='col-sm-6'>Minimum Amount<br>{{ Form::text('minamount','',array("pattern"=>"\d*",'class'=>'form-control','placeholder'=>'Minimum Amount (Amount Tsh)','required'=>'required')) }}</div>
              <div class='col-sm-6'>Maximum Amount<br>{{ Form::text('maxamount','',array("pattern"=>"\d*",'class'=>'form-control','placeholder'=>'Maximum Amount  (Amount Tsh)','required'=>'required')) }} </div>
          </div>
          <h4>Loan Return Time</h4>
          <div class='form-group'>
                <div class='col-sm-6'>Minimum time(Month)<br>{{ Form::text('mintime','',array("pattern"=>"\d*",'class'=>'form-control','placeholder'=>'Minimum time (Month)','required'=>'required')) }} </div>
                <div class='col-sm-6'>Maximum time(Month)<br>{{ Form::text('maxtime','',array("pattern"=>"\d*",'class'=>'form-control','placeholder'=>'Maximum time (Month)','required'=>'required')) }}</div>
          </div>

          <div class='form-group'>

           <div class="col-sm-12">Other Information <br>{{ Form::textarea('other','',array('class'=>'form-control','placeholder'=>'Other Information eg allowed people(Optional)','rows'=>'3')) }} </div>
           </div>
          <div id="output"></div>
          <div class='form-group text-center'>
            {{ Form::submit('Submit',array('class'=>'btn btn-primary','id'=>'submitqn')) }}
            {{ Form::reset('Reset',array('class'=>'btn btn-warning','id'=>'submitqn')) }}
          </div>
{{ Form::close() }}

<script>
$(document).ready(function (){
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
        $("#listloan").load("<?php echo url("loans/list") ?>");
        setTimeout(function() {
            $("#output").html("");
        }, 2500);
    }
});
</script>

