@if($applicat->status == "granted" )
<h3>Payment Details <div id="showpay" class="btn-primary btn btn-xs pull-right"><i class="fa fa-chevron-circle-down"></i> Show</div> </h3>
<table class="table table-responsive payee">
    <tr>
        <th>Date</th>
        <th>Principal Amount</th>
        <th>Principal Return</th>
        <th>Interest Per Return</th>
        <th>Instalment Amount</th>
        <th>Outstanding Balance</th>
    </tr>
    <?php
$granted = $applicat->granted->loan_amount/$applicat->group->memberes()->count();
    $return = $applicat->granted->amount_to_return/$applicat->group->memberes()->count();
    $perreturn = $applicat->granted->amount_per_return/$applicat->group->memberes()->count();
   ?>
    @if($applicat->returns()->count() == 0 )
    <tr>
        <td>{{ $applicat->granted->start_date }}</td>
        <td>{{ $granted }}</td>
        <td>{{ intval($granted/($applicat->granted->amount_to_return / $applicat->granted->amount_per_return),10) }}</td>
        <td>{{ intval(($return - $granted)/ ($applicat->granted->amount_to_return/$applicat->granted->amount_per_return),10) }}</td>
        <td> - </td>
        <td>{{ $applicat->granted->loan_amount }}</td>
    </tr>
    @else
    <tr>
        <td>{{ $applicat->granted->start_date }}</td>
        <td>{{ $applicat->granted->loan_amount }}</td>
        <td>{{ intval($applicat->granted->loan_amount/($applicat->granted->amount_to_return / $applicat->granted->amount_per_return),10) }}</td>
        <td>{{ intval(($applicat->granted->amount_to_return - $applicat->granted->loan_amount)/ ($applicat->granted->amount_to_return/$applicat->granted->amount_per_return),10) }}</td>
        <td> - </td>
        <td>{{ $applicat->granted->loan_amount }}</td>
    </tr>
    @foreach( $applicat->returns as $ret )
    <tr>
        <td>{{ $ret->return_date }}</td>
        <td> </td>
        <td>{{ intval($applicat->granted->loan_amount/($applicat->granted->amount_to_return / $applicat->granted->amount_per_return),10) }}</td>
        <td>{{ intval(($applicat->granted->amount_to_return - $applicat->granted->loan_amount)/ ($applicat->granted->amount_to_return/$applicat->granted->amount_per_return),10) }}</td>
        <td>{{ $ret->amount }}</td>
        <td>
            {{ $ret->balance }}
            @if($ret->remaining != 0)
            (<span class="text-danger"> {{ $ret->remaining }} </span>)
            @endif
        </td>
    </tr>
    @endforeach
    @endif
    <tr id="totals">
        <th>Total</th>
        <th>s</th>
        <th>s</th>
        <th>s</th>
        <th>s</th>
        <th>s</th>
    </tr>
</table>

<script>

    $(document).ready(function(){
        $("table.payee").hide();
        $("#showpay").click(function(){
            $("table.payee").toggle("slow")
        })

        $("table.payee #totals th").each(function(){
            $(this).html("0")
        })
    })
</script>
@endif