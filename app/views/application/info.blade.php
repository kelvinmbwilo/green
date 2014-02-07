<h3>Applicaation Information<span class="pull-right"><b>{{ date("j M, Y",strtotime($applicat->created_at)) }}</b></span></h3>

Applicant:<b style="text-transform: capitalize">{{ $applicat->applicant->firstname." ".$applicat->applicant->middlename." ".$applicat->applicant->lastname; }}</b><br>
Status:<b>{{$applicat->status }}</b><br>
Applied Amount: Tsh <b>{{$applicat->applied_amount }}</b>/=<br>

@if($applicat->amount_granted != 0)
Granted Amount: <b>{{$applicat->amount_granted }}</b>/=<br>
@endif

Bussiness: <b><small><a href="{{url("applicant/bussness/{$applicat->bussiness->id}") }}">{{$applicat->bussiness->discr }}</a></small></b><br>

Collateral: <b><small>{{$applicat->collateral }}</small></b><br>

@if($applicat->comments != "" && $applicat->status != "granted")
Comments: <b><small>{{$applicat->comments }}</small></b><br>
@endif
@if($applicat->status != "granted")
<a href="#b" class="btn btn-xs pull-right text-danger deleteapp"><i class="fa fa-trash-o "></i> delete</a>
<a href="{{url("applicant/edit/application/{$applicat->id}")}}" class="btn btn-xs pull-right"><i class="fa fa-pencil"></i> edit</a>
@endif