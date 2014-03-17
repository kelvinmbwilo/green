<h3>Add Parameter</h3>
{{ Form::open(array("url"=>url('settings/cashflow/parameter/add'),"class"=>"form-horizontal","id"=>"FileUploader")) }}
<div class='form-group'>

    <div class='col-sm-12'>Parameter <br>{{ Form::text('name','',array('class'=>'form-control','placeholder'=>'Parameter','required'=>'required')) }} </div>
</div>
<?php
$arr = array("In Flow"=>"In Flow", "Out Flow"=>"Out Flow");
?>
<div class='form-group'>
    <div class='col-sm-12'>Used For<br>{{ Form::select('flow',$arr,'',array('class'=>'form-control','required'=>'requiered')) }} </div>
</div>

<div id="output"></div>
<div class='form-group text-center'>
    {{ Form::submit('Add',array('class'=>'btn btn-primary','id'=>'submitqn')) }}
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
            }, 3000);
            $("#listrules").load("<?php echo url("settings/cashflow/parameter/list") ?>")
        }
    });
</script>