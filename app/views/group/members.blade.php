<p class="lead">Group Members</p>
<ul class="list-group">
    @if($group->memberes()->count() == 0)
    <h2>No Members</h2>
    @else
    @foreach($group->memberes as $member)
    <li class="list-group-item">
        <div class="row">
            <div class="col-sm-6">
                <b>Name</b>:<br>
                    {{ $member->applicant->firstname }} {{ $member->applicant->middlename }} {{ $member->applicant->lastname }}
            </div>

            <div class="col-sm-3">
                <b>Gender:</b><br>
                {{ $member->applicant->gender }}
            </div>
            <div class="col-sm-3">
                <b>Marital Status:</b><br>
                {{ $member->applicant->marital_status }}
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <b>Age:</b><br>
                {{ $member->applicant->bitrhdate }}
            </div>
            <div class="col-sm-3">
                <b>Residence:</b><br>
                {{ $member->applicant->residense }}
            </div>
            <div class="col-sm-3">
                <b>Phone:</b><br>
                {{ $member->applicant->phone }}
            </div>
            <div class="col-sm-3">
                <b>Address:</b><br>
                {{ $member->applicant->postal_address }}
            </div>
        </div>
        <p id="{{ $member->applicant->id }}">
            <a href="{{ url("applicant/{$member->applicant->id}") }}" class="btn btn-xs btn-primary"><i class="fa fa-info-circle"></i> More Info </a>
            <a href="#" class="btn btn-xs btn-warning trans"><i class="fa fa-money"></i> Savings Transaction </a>
        </p>

    </li>
    @endforeach
    @endif
</ul>
<script>
    $(document).ready(function(){
        $(".trans").click(function(){
            var id=$(this).parent().attr("id");
            var modal ='<div class="modal fade" id="mymodal">';
            modal +='<div class="modal-dialog">';
            modal +='<div class="modal-content">';
            modal +='<div class="modal-header">';
            modal +='<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
            modal +='<h4 class="modal-title">Modal title</h4>';
            modal +='</div>';
            modal +='<div class="modal-body">';
            modal +='<p>One fine body&hellip;</p>';
            modal +='</div>';
            modal +='<div class="modal-footer">';
            modal +='<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>';
            modal +='<button type="button" class="btn btn-primary">Save changes</button>';
            modal +='</div>';
            modal +='</div><!-- /.modal-content -->';
            modal +='</div><!-- /.modal-dialog -->';
            modal +='</div><!-- /.modal -->';
            $("body").append(modal);
            $("#mymodal").modal("show");
            $("#mymodal .modal-body").load("<?php echo url("applicant/transactions") ?>/"+id);

        })
    })
</script>
