<div id="editform">
{{ Form::open(array("url"=>url("rules/edit/{$rule->id}"),"class"=>"form-horizontal","id"=>"FileUploader")) }}

<div class='form-group'>

    <div class="col-sm-12">Loan Rules <br>{{ Form::textarea('other',$rule->value,array('class'=>'form-control','placeholder'=>'Loan Rules eg allowed people','rows'=>'4',"required"=>"required")) }} </div>
</div>
<div id="output"></div>
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
            $("#output").html("<h3><i class='fa fa-spin fa-spinner '></i><span>Making changes please wait...</span><h3>");
            $(this).ajaxSubmit({
                target: '#output',
                success:  afterSuccess
            });

        });

        function afterSuccess(){
            $("#listrules").load("<?php echo url("rules/list") ?>")
            setTimeout(function() {
                $("#editform").hide("slow");
            }, 2000);
        }
    });
</script>
    </div>