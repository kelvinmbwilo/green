{{ Form::open(array("url"=>url("/applicant/add/application/sponsor/{$applicat->id}"),"class"=>"form-horizontal")) }}
<h3>Grant Loan <span class="pull-right" style="text-transform: capitalize">Applicant:{{ $applicat->applicant->firstname." ".$applicat->applicant->middlename." ".$applicat->applicant->lastname;  }}</span></h3>

<div class='form-group'>
    <div class='col-sm-6'>Amount Granted<br>{{ Form::text('firstname','',array('class'=>'form-control','placeholder'=>'First Name','required'=>'required')) }} </div>
    <div class='col-sm-6'>Return Duration<br>{{ Form::select('gender',array("daily"=>"Daily","1Week"=>"One Week","2Week"=>"Two Weeks","3Week"=>"Three Weeks","month"=>"One Month"),'',array('class'=>'form-control','required'=>'requiered')) }}</div>
</div>
<div class='form-group'>
    <div class='col-sm-6'>Payment Start at<br>{{ Form::text('lastname','',array('class'=>'form-control','placeholder'=>'Last Name','required'=>'required')) }} </div>
    <div class='col-sm-6'>Payment ends at<br>{{ Form::select('gender',array("Male"=>"Male","Female"=>"Female"),'',array('class'=>'form-control','required'=>'requiered')) }} </div>
</div>
<div class='form-group'>
    <div class='col-sm-6'>Phone Number<br>{{ Form::text('phone','',array('class'=>'form-control','placeholder'=>'Phone Number(Required)','required'=>'required')) }} </div>
    <div class='col-sm-6'>Postal Address<br>{{ Form::text('postal','',array('class'=>'form-control','placeholder'=>'Postal Address(Optional)')) }} </div>
</div>
<div class='form-group'>
    <div class="col-sm-12">Other Information <br>{{ Form::textarea('other','',array('class'=>'form-control','placeholder'=>'Other Information(Optional)','rows'=>'3')) }} </div>
</div>

<div class='form-group text-center'>
    {{ Form::submit('Submit',array('class'=>'btn btn-primary','id'=>'submitqn')) }}
    {{ Form::reset('Reset',array('class'=>'btn btn-warning','id'=>'submitqn')) }}
    <a href="{{ url("applicant/application/{$applicat->id}") }}" class="btn btn-danger"><i class="fa fa-times"></i> Cancel</a>
</div>
{{ Form::close() }}