<?php

?>
<div class="col-xs-12" id="procinfo">
    @if($applicat->status == "declined")
    <h3>Application Processing</h3>
    <h4>This Application Was Declined</h4>
    <button class="btn btn-block btn-primary" title="Grant loan for this application" id="grant">
        <i class="fa fa-check fa-2x"></i> Grant
    </button>
    @elseif($applicat->status == "granted")
    <h3>Loan Processing</h3>
    @include("groupapp.returns")

    @else
    <h3>Application Processing</h3>
    <button class="btn btn-block btn-primary" title="Grant loan for this application" id="grant">
        <i class="fa fa-check fa-2x"></i> Grant
    </button>
    <button class="btn btn-block btn-danger" title="Decline This loan application" id="decline">
        <i class="fa fa-times fa-2x"></i> Decline
    </button>
    @endif
</div>

<script>
    $(document).ready(function(){
        //when a user clicks decline
        $("#decline").click(function(){
            var btn = $(this);
            $(this).hide("slow").parent().append("<span class='text-center'>Reasons:<br><textarea id='comments' class='form-control'></textarea><br>Your just about to decline this loan application <br><b>Are You Sure </b><br /> <a href='#s' id='yes' class='btn btn-success btn-xs'><i class='fa fa-check'></i> Yes</a> <a href='#s' id='no' class='btn btn-danger btn-xs'> <i class='fa fa-times'></i> No</a></span>");
            //if user says no
            $("#no").click(function(){
                btn.show("slow");
                $(this).parent().parent().find("span").remove();
            });
            $("#yes").click(function(){
                var comm = $("#comments").val();
                if($("#comments").val() == ""){
                    $("#comments").focus();
                }else{

                    $("#procinfo").html("<i class='fa fa-spin fa-spinner fa-3x'></i> Processing... ")
                    var url = "<?php echo url("group/application/decline/{$applicat->id}") ?>"
                    $.post(url,{comm:comm},function(data){
                        $("#applinfo").load("<?php echo url("group/application/show/{$applicat->id}") ?>");
                        $("#pocesss").load("<?php echo url("group/application/process/show/{$applicat->id}") ?>");
                    })
                }
            });

            //
        });

        //when a user grant a loan
        $("#grant").click(function(){
            var btn = $(this);
            $(this).hide("slow").parent().append("<span class='text-center'><br>Your just about to accept this loan application <br><b>Are You Sure </b><br /> <a href='#s' id='yes' class='btn btn-success btn-xs'><i class='fa fa-check'></i> Yes</a> <a href='#s' id='no' class='btn btn-danger btn-xs'> <i class='fa fa-times'></i> No</a></span>");
            //if user says no
            $("#no").click(function(){
                btn.show("slow");
                $(this).parent().parent().find("span").remove();
            });
            $("#yes").click(function(){
                $("#procinfo").html("<i class='fa fa-spin fa-spinner fa-3x'></i> Processing... ")
                var url = "<?php echo url("group/application/grant/{$applicat->id}") ?>"
                $("#pocesss").load(url)

            });

        })
    });
</script>