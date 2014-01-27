$(document).ready(function(){
//    $("#registerpat").click(function (){
//        $('#maincontents').html("<div class='text-center'><i class='fa fa-spinner fa-spin fa-5x'></i></div>");
//        $.ajax({
//        type: "GET",
//        url:'patient/add/basic',
//        data: { id: "userId" }
//      }).done(function( msg ) {
//        $('#maincontents').html(msg);
//      });
//    });
    $("#error").hide();
    $("#login").click(function(){
       if($("#email").val() === ""){
            $("#email").focus();
        }else if($("#password").val() === ""){
        $("#password").focus();
        }else{
            
        //prepare data for a login
        var email = $("#email").val();
        var password = $("#password").val();
        var btn = $(this);
        $(this).html("<i class='fa fa-spinner fa-spin'></i> login in...");
        //use ajax method to post the form while displaying the loading image
        $.ajax({
            type: "GET",
            url:'index.php/user',
            data: { 
                email: email,
                password: password
            }
          }).done(function( msg ) {
              if(msg == 'nope'){
                  $("#error").show("slow");
                  btn.html("Sign In");
              }else{
                  window.location = "index.php/admin"
              }
              
          });
      }
    });
    
    
    //editing categories
    
    $(".deletepost").click(function(){
        var id1 = $(this).parent().attr('id');
        $(".deletepost").show("slow").parent().parent().find("span").remove();
        var btn = $(this).parent().parent();
        $(this).hide("slow").parent().append("<span><br>Are You Sure <br /> <a href='#s' id='yes'><i class='fa fa-check'></i> Yes</a> <a href='#s' id='no'> <i class='fa fa-times'></i> No</a></span>");
        $("#no").click(function(){
            $(this).parent().parent().find(".deletepost").show("slow");
            $(this).parent().parent().find("span").remove();
        });
        $("#yes").click(function(){
            $(this).parent().html("<br><i class='fa fa-spinner fa-spin'></i>deleting...");
            $.post("../course/delete/"+id1,function(data){
              btn.hide("slow").next("hr").hide("slow");
           });
        });
    });//endof deleting course
    
    $("#stafftable").dataTable();
    $(".deletestaff").click(function(){
        var id1 = $(this).parent().attr('id');
        $(".deletestaff").show("slow").parent().parent().find("span").remove();
        var btn = $(this).parent().parent();
        $(this).hide("slow").parent().append("<span><br>Are You Sure <br /> <a href='#s' id='yes'><i class='fa fa-check'></i> Yes</a> <a href='#s' id='no'> <i class='fa fa-times'></i> No</a></span>");
        $("#no").click(function(){
            $(this).parent().parent().find(".deletestaff").show("slow");
            $(this).parent().parent().find("span").remove();
        });
        $("#yes").click(function(){
            $(this).parent().html("<br><i class='fa fa-spinner fa-spin'></i>deleting...");
            $.post("../staff/delete/"+id1,function(data){
              btn.hide("slow").next("hr").hide("slow");
           });
        });
    });//endof deleting staff
    
    
    $("#coursetable").dataTable();
    $(".deletestaffcourse").click(function(){
        var id1 = $(this).parent().attr('id');
        $(".deletestaffcourse").show("slow").parent().parent().find("span").remove();
        var btn = $(this).parent().parent();
        $(this).hide("slow").parent().append("<span><br>Are You Sure <br /> <a href='#s' id='yes'><i class='fa fa-check'></i> Yes</a> <a href='#s' id='no'> <i class='fa fa-times'></i> No</a></span>");
        $("#no").click(function(){
            $(this).parent().parent().find(".deletestaffcourse").show("slow");
            $(this).parent().parent().find("span").remove();
        });
        $("#yes").click(function(){
            $(this).parent().html("<br><i class='fa fa-spinner fa-spin'></i>deleting...");
            $.post("../../staff/deletecourse/"+id1,function(data){
              btn.hide("slow").next("hr").hide("slow");
           });
        });
    });//endof deleting staff
    
    $(".deletesub").click(function(){
        var id1 = $(this).parent().attr('id');
        $(".deletesub").show("slow").parent().parent().find("span").remove();
        var btn = $(this).parent().parent();
        $(this).hide("slow").parent().append("<span><br>Are You Sure <br /> <a href='#s' id='yes'><i class='fa fa-check'></i> Yes</a> <a href='#s' id='no'> <i class='fa fa-times'></i> No</a></span>");
        $("#no").click(function(){
            $(this).parent().parent().find(".deletesub").show("slow");
            $(this).parent().parent().find("span").remove();
        });
        $("#yes").click(function(){
            $(this).parent().html("<br><i class='fa fa-spinner fa-spin'></i>deleting...");
            $.post("../admin/deletesub",{id:id1},function(data){
              btn.hide("slow").next("hr").hide("slow");
           });
        });
    });//endof deleting category

 //editing questions
    $('.editqn').click(function(){
        $(this).hide('slow');
        var editbtn = $(this);
        var original = editbtn.parent().parent().find('.editable').text().replace(/^\s+|\s+$/g,'') ;
        var textarea = "<textarea class='form-control col-sm-9'>"+original+"</textarea>";
        textarea+= "<a href='#a' class='changeval'><i class='fa fa-check fa-2x text-success'></i> save </a>"
        textarea += "<a href='#a' class='cancelchange'><i class='fa fa-times fa-2x text-danger'></i> Cancel</a>";
        editbtn.parent().parent().find('.editable').html(textarea);
        
        //cancelling a process
        $(".cancelchange").click(function(){
            $(this).parent().html(original);
            editbtn.show("slow");
        });
        
        //processing the tick
        $(".changeval").click(function(){
            var id = $(this).parent().attr("id");
            var value = $(this).parent().find('textarea').val();
            var td = $(this).parent();
            $(this).html("<i class='fa fa-spinner fa-spin fa-2x'></i> Editing....")
           
           //sending data to be proccessed 
            $.ajax({
            type: "GET",
            url:'../question/manage',
            data: { 
                id: id,
                value :value
            }
          }).done(function( msg ) {
              td.html(msg);
              editbtn.show("slow");
          });
          
          
        });
    });
    
    
    
    $(".deleteqn").click(function(){
        var id1 = $(this).parent().parent().attr('id');
        $(".deleteqn").show("slow").parent().parent().find("span.delqnn").remove();
        var btn = $(this).parent().parent();
        $(this).hide("slow").parent().append("<span class='delqnn'><br>Are You Sure <br /> <a href='#s' id='yes'><i class='fa fa-check'></i> Yes</a> <a href='#s' id='no'> <i class='fa fa-times'></i> No</a></span>");
        $("#no").click(function(){
            $(this).parent().parent().find(".deleteqn").show("slow");
            $(this).parent().parent().find("span.delqnn").remove();
        });
        $("#yes").click(function(){
            $(this).parent().html("<br><i class='fa fa-spinner fa-spin'></i>deleting...");
            $.post("../question/delete",{id:id1},function(data){
              btn.hide("slow").next("hr").hide("slow");
           });
        });
    });//endof deleting category
    
    $(".deleteuser").click(function(){
        var id1 = $(this).parent().attr('id');
        $(".deleteanswer").show("slow").parent().parent().find("span.btns").remove();
        var btn = $(this).parent().parent();
        $(this).hide("slow").parent().append("<span class='btns'><br>Are You Sure <br /> <a href='#s' id='yes'><i class='fa fa-check'></i> Yes</a> <a href='#s' id='no'> <i class='fa fa-times'></i> No</a></span>");
        $("#no").click(function(){
            $(this).parent().parent().find(".deleteuser").show("slow");
            $(this).parent().parent().find("span.btns").remove();
        });
        $("#yes").click(function(){
            $(this).parent().html("<br><i class='fa fa-spinner fa-spin'></i>deleting...");
            $.post("../admin/deleteuser",{id:id1},function(data){
              btn.hide("slow").hide("slow");
           });
        });
    });//endof deleting subquestions
    
    $(".addsubqn").click(function (){
        var textarea = "<textarea class='form-control col-sm-4'></textarea><br>";
        textarea+= "<a href='#a' id='addsubqn'><i class='fa fa-check text-info'></i> submit</a>";
        $(this).parent().parent().find(".subqn").append("<span class='otherqn'>"+textarea+"</span>");
        
        $("#addsubqn").click(function (){
            var value = $(this).parent().find("textarea").val();
            $(this).html("<i class='fa fa-spinner fa-spin fa-2x'></i> Adding....")
            var id = $(this).parent().parent().attr('id');
           //sending data to be proccessed 
            $.ajax({
            type: "GET",
            url:'../subquestion/add',
            data: { 
                question_id: id,
                value :value
            }
          }).done(function( msg ) {
             location.reload()
          });
          
        });
    })

    //adding dependencies
    $(".adddependece").click(function(){
        //display a list of all questions with multiple values
    });
});
