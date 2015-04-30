{{ Form::open(array("url"=>url("rules/add"),"class"=>"form-horizontal","id"=>"FileUploader")) }}

<div class='form-group'>

    <div class="col-sm-12">Loan Rules <br>{{ Form::textarea('other','',array('class'=>'form-control','placeholder'=>'Loan Rules eg allowed people','rows'=>'4',"required"=>"required")) }} </div>
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
            setTimeout(function() {
                $("#output").html("");
            }, 2500);
            $("#listrules").load("<?php echo url("rules/list") ?>")
        }
    });
</script>