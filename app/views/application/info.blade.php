<h3>Application Information<span class="pull-right"><b>{{ date("j M, Y",strtotime($applicat->created_at)) }}</b></span></h3>

Applicant:<b style="text-transform: capitalize">{{ $applicat->applicant->firstname." ".$applicat->applicant->middlename." ".$applicat->applicant->lastname; }}</b><br>
Status:<b>{{$applicat->status }}</b><br>
Applied Amount: Tsh <b>{{$applicat->applied_amount }}</b>/=<br>

@if($applicat->amount_granted != 0)
    Granted Amount: <b>{{$applicat->amount_granted }}</b>/=<br>
    Loan Duration : <b>{{ $applicat->granted->loan_expected_duration }} Mounths </b> <br>
    Payment Start At: <b>{{ date("j M Y",strtotime($applicat->granted->start_date)) }}</b> <br>
    Payment To End At: <b>{{ date("j M Y",strtotime($applicat->granted->finish_date)) }}</b> <br>
    Amount To return: <b>{{ $applicat->granted->amount_to_return }}</b> <br>

    @if($applicat->returns()->count() == 0 )
        Paid Amount:<b> 0 </b><br>
        Balance:<b> {{ $applicat->granted->amount_to_return }}</b> <br>
    @else
        Paid Amount:<b> {{ $applicat->returns()->sum("amount") }}</b><br>
        Balance:<b> {{ $applicat->returns()->orderBy("created_at","desc")->first()->balance }}</b> <br>
    @endif
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