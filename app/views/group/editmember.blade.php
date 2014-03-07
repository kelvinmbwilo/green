
{{ Form::open(array("url"=>url("group/{$group->id}/member/edit/{$app->id}"),"class"=>"form-horizontal","id"=>"FileUploader")) }}
<h4 style="padding-top: 10px">Update user Information Information</h4>
<div class='form-group'>
    <div class='col-sm-6'>First Name<br>{{ Form::text('firstname',$app->firstname,array('class'=>'form-control','placeholder'=>'First Name','required'=>'required')) }} </div>
    <div class='col-sm-6'>Middle Name<br>{{ Form::text('middlename',$app->middlename,array('class'=>'form-control','placeholder'=>'Middle Name')) }}</div>
</div>
<div class='form-group'>
    <div class='col-sm-6'>Last Name<br>{{ Form::text('lastname',$app->lastname,array('class'=>'form-control','placeholder'=>'Last Name','required'=>'required')) }}</div>
    <div class='col-sm-6'>Date Of Birth<br>{{ Form::text('birthdate',$app->bitrhdate,array('class'=>'form-control','placeholder'=>'Date of Birth','required'=>'required','id'=>'Birth_Date')) }} </div>
</div>
<div class='form-group'>
    <div class='col-sm-6'>Gender<br>{{ Form::select('gender',array("Male"=>"Male","Female"=>"Female"),$app->gender,array('class'=>'form-control','required'=>'requiered')) }} </div>
    <div class='col-sm-6'>Marital Status<br>{{ Form::select('marital',array("Single"=>"Single","Married"=>"Married","Devorced"=>"Devorced","Widow"=>"Widow","Widower"=>"Widower"),$app->marital_status,array('class'=>'form-control','required'=>'requiered')) }}</div>
</div>
<div class='form-group'>
    <div class='col-sm-6'>Phone Number<br>{{ Form::text('phone',$app->phone,array('class'=>'form-control','placeholder'=>'Phone Number','required'=>'required')) }} </div>
    <div class='col-sm-6'>Postal Address<br>{{ Form::text('postal',$app->postal_address,array('class'=>'form-control','placeholder'=>'Postal Address')) }}</div>
</div>
<div class='form-group'>
    <div class='col-sm-6'>Residence<br>{{ Form::text('residense',$app->residense,array('class'=>'form-control','placeholder'=>'Residence Area','required'=>'required')) }} </div>
    <div class='col-sm-6'>Family Size<br>{{ Form::select('family',range(1,30),$app->family_size,array('class'=>'form-control','required'=>'requiered')) }}</div>
</div>
<div id="output"></div>
<div class='form-group text-center'>
    {{ Form::submit('Submit',array('class'=>'btn btn-primary','id'=>'submitqn')) }}
    {{ Form::button('Cancel',array('class'=>'btn btn-danger','id'=>'cancel')) }}
</div>
{{ Form::close() }}

<script>
    $(document).ready(function (){
        $("#cancel").click(function(){
            $("#editll").hide("slow");
        })

        $("#Birth_Date").datepicker({
            changeMonth: true,
            changeYear: true,
            yearRange: "1950:<?php echo date("Y") ?>",
            dateFormat:"yy-mm-dd"
        });

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

