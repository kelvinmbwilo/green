<h3>Update Parameter</h3>
{{ Form::open(array("url"=>url("settings/parameter/edit/{$param->id}"),"class"=>"form-horizontal","id"=>"FileUploader")) }}
<div class='form-group'>

    <div class='col-sm-12'>Parameter <br>{{ Form::text('name',$param->name,array('class'=>'form-control','placeholder'=>'Parameter','required'=>'required')) }} </div>
</div>
<div class='form-group'>
    <div class='col-sm-12'>Cash Flow Type<br>{{ Form::select('flow',array("in"=>"Cash In Flow","out"=>"Cash Out Flow"),$param->flow,array('class'=>'form-control','required'=>'requiered')) }} </div>
</div>
<div id="output"></div>
<div class='form-group text-center'>
    {{ Form::submit('Edit',array('class'=>'btn btn-primary','id'=>'submitqn')) }}
    {{ Form::button('Cancel',array('class'=>'btn btn-danger','id'=>'canceledit')) }}
</div>

{{ Form::close() }}

<script>
    $(document).ready(function (){

        $("#canceledit").click(function(){
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
            setTimeout(function() {
                $("#editll").hide("slow");
            }, 2000);
            $("#listrules").load("<?php echo url("settings/parameter/list") ?>")
        }
    });
</script>