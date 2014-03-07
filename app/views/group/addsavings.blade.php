{{ Form::open(array("url"=>url("group/{$group->id}/member/savings/{$app->id}"),"class"=>"form-horizontal","id"=>"FileUploader")) }}
<h2 class="text-center text-muted">Group Member Savings</h2>
<h4 class="text-center">Applicant: <a href="{{ url("applicant/{$app->id}") }}">{{ $app->firstname." ".$app->middlename." ".$app->lastname; }}</a></h4>
@if($app->savings()->count() == 0)
 <h4 class="text-center">Current Savings: 0 Tsh</h4>
@else
<h4 class="text-center">Current Savings: {{ $app->savings->amount }} Tsh</h4>
@endif
    <div class='form-group'>
        <div class='col-sm-11'>Savings <br>{{ Form::text('savings','',array("pattern"=>"\d*",'class'=>'form-control','placeholder'=>'Added Savings (Amount Tsh)','required'=>'required')) }} </div>
    </div>
<div id="output"></div>
<div class='col-sm-12 form-group text-center'>
    {{ Form::submit('Add Savings',array('class'=>'btn btn-primary','id'=>'submitqn')) }}
    <a href="#c" class="btn btn-danger" id="cancel"><i class="fa fa-times"></i> Cancel</a>
</div>
{{ Form::close() }}

<script>
    $(document).ready(function (){
        $("#cancel").click(function(){
            $("#editll").hide("slow");
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
            $("#load").html("<h3><i class='fa fa-spin fa-spinner '></i><span>loading changes please wait...</span><h3>");
            $("#listmember").load("<?php echo url("group/{$group->id}/member/list") ?>");
            setTimeout(function() {
                $("#editll").hide("slow");
            }, 3000);
        }
    });
</script>