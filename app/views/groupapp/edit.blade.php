{{ Form::open(array("url"=>url("group/application/edit/{$applicat->id}"),"class"=>"form-horizontal","id"=>"FileUploader")) }}
<?php
$gsaving = 0;
foreach($applicat->group->memberes as $gmember){
    $sav = ($gmember->applicant->savings()->count() == 0)?0:$gmember->applicant->savings->amount;
    $gsaving += $sav;
}
?>
<h3>Application Form</h3>
<div class="thumbnail">
    <h3>Loan Information</h3>
    <h4>Group Savings: {{ $gsaving }} Tsh</h4>
    <div class='form-group'>
        {{ Form::label('applied', 'Applied Amount (in Tsh)',array('class'=>'control-label col-sm-3')) }}
        <div class='col-sm-9'>{{ Form::text('applied',$applicat->applied_amount,array("pattern"=>"\d*",'class'=>'form-control','placeholder'=>'Applied Amount','required'=>'required')) }} </div>
    </div>

    <div class='form-group'>
        {{ Form::label('savings', 'Savings per Return (in Tsh)',array('class'=>'control-label col-sm-3')) }}
        <div class='col-sm-9'>{{ Form::text('savings',$applicat->savings_per_return,array("pattern"=>"\d*",'class'=>'form-control','placeholder'=>'Savings per Return','required'=>'required')) }} </div>
    </div>

    <div class='form-group'>
        {{ Form::label('comments', 'Any Comments',array('class'=>'control-label col-sm-3')) }}
        <div class='col-sm-9'>{{ Form::textarea('comments',$applicat->comments,array('class'=>'form-control','placeholder'=>'Any Comments','rows'=>'3')) }} </div>
    </div>

</div>
<div id="output"></div>
<div class='form-group text-center' id="{{ $applicat->group->id }}">
    {{ Form::submit('Edit',array('class'=>'btn btn-primary','id'=>'submitqn')) }}
    <a href="#" class="btn btn-danger" id="canceledit"><i class="fa fa-times"></i> Cancel</a>
</div>

{{ Form::close() }}
<script>
    $(document).ready(function (){
        $("#canceledit").click(function(){
            var url= "<?php echo url("group/application/add/") ?>/";
            url += id;
            $("#editll").html("<i class='fa fa-spinner fa-spin fa-3x'></i>Loading Content...");
            $("#editll").load(url)
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
            $("#listapp").load("<?php echo url("group/{$applicat->group->id}/application/list") ?>")
            setTimeout(function() {
                var url= "<?php echo url("group/application/add/{$applicat->group->id}") ?>";
                $("#editll").html("<i class='fa fa-spinner fa-spin fa-3x'></i>Loading Content...");
                $("#editll").load(url)
            }, 2000);

        }
    });
</script>