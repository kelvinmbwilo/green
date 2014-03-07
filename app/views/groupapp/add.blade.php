{{ Form::open(array("url"=>url("group/{$group->id}/add/application"),"class"=>"form-horizontal")) }}
<?php
$gsaving = 0;
foreach($group->memberes as $gmember){
    $sav = ($gmember->applicant->savings()->count() == 0)?0:$gmember->applicant->savings->amount;
    $gsaving += $sav;
}
?>

@if($group->applications()->where("status","pending")->get()->count() != 0)
<h2 class="text-info"><i class="fa fa-exclamation"></i> Info</h2>
<h4>You can not add application for this Group, it have already applied for a loan, The Application may either be processed or the group has an unpaid Loan</h4>
@elseif($group->applications()->where("status","pending")->get()->count() != 0)
<h2 class="text-info"><i class="fa fa-exclamation"></i> Info</h2>
<h4>You can not add application for this Group, it has not yet finished to pay current loan</h4>
@elseif($group->memberes()->count() == 0)
<h2 class="text-info"><i class="fa fa-exclamation"></i> Info</h2>
<h4>You can not add application for this Group, it has no members please <a href="{{ url("groups/members/{$group->id}") }}">add members</a> first</h4>
@else
<h3>Application Form</h3>
<div class="thumbnail">

    <h3>Loan Information</h3>
    <input type="hidden" value="{{ $group->id }}" name='id'>
    <h4>Members {{ $group->memberes()->count() }}</h4>
    <h4>Group Savings: {{ $gsaving }} Tsh</h4>
    <div class='form-group'>
        {{ Form::label('applied', 'Applied Amount (in Tsh)',array('class'=>'control-label col-sm-3')) }}
        <div class='col-sm-9'>{{ Form::text('applied','',array("pattern"=>"\d*",'class'=>'form-control','placeholder'=>'Applied Amount','required'=>'required')) }} </div>
    </div>

    <div class='form-group'>
        {{ Form::label('savings', 'Savings per Return (in Tsh)',array('class'=>'control-label col-sm-3')) }}
        <div class='col-sm-9'>{{ Form::text('savings','0',array("pattern"=>"\d*",'class'=>'form-control','placeholder'=>'Savings per Return','required'=>'required')) }} </div>
    </div>

    <div class='form-group'>
        {{ Form::label('comments', 'Any Comments',array('class'=>'control-label col-sm-3')) }}
        <div class='col-sm-9'>{{ Form::textarea('comments','',array('class'=>'form-control','placeholder'=>'Any Comments','rows'=>'3')) }} </div>
    </div>

</div>

<div class='form-group text-center'>
    {{ Form::submit('Register',array('class'=>'btn btn-primary','id'=>'submitqn')) }}
    {{ Form::reset('Reset',array('class'=>'btn btn-warning','id'=>'submitqn')) }}
    <a href="{{ url("groups/{$group->id}") }}" class="btn btn-danger"><i class="fa fa-times"></i> Cancel</a>
</div>
@endif <!-- ending the if to check if the user is vaiable to take a loan-->

{{ Form::close() }}