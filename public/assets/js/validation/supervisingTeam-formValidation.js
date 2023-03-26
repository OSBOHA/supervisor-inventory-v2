
$(document).ready(function () {
    let valid = false;
    //Disable Standards Checkbox
    $('.follow_up_post_standard').attr('disabled', 'disabled');
    $('.mark_problems_post_standard').attr('disabled', 'disabled');
    $('.new_ambassadors_post_standard').attr('disabled', 'disabled');
});

//####### START SELECT SUPERVISOR #######// 

$("#select_form").change(function () {
    default_values();
    $("#supervisor_id").val($("#select_form").find(":selected").val());
    $("#supervisor_duties_form").show();
    $("#super_duties_image").hide();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var supervisor_id = $("#supervisor_id").val();

    $.ajax({
           type:'POST',
           data:{supervisor_id:supervisor_id},
           url:"show",
           success:function(data){

                if(data.duty !=null){
                //leader_members
                document.getElementById('leader_members').value = data.duty.leader_members;   
                //team_final_mark
                document.getElementById('team_final_mark').value = data.duty.team_final_mark;   
                //follow_up_post
                if(data.duty.follow_up_post  == "published" ){
                    $("#follow_up_post_1").prop("checked", true);
                }
                else if(data.duty.follow_up_post  == "didnt publish" ){
                    $("#follow_up_post_2").prop("checked", true);
                }
                else if(data.duty.follow_up_post  == "published instead" ){
                    $("#follow_up_post_3").prop("checked", true);
                }
                else if(data.duty.follow_up_post  == "incomplete" ){
                    $("#follow_up_post_4").prop("checked", true);
                    $('.follow_up_post_standard').removeAttr('disabled');
                }
                //mark_problems_post
                if(data.duty.mark_problems_post  == "published" ){
                    $("#mark_problems_post_1").prop("checked", true);
                }
                else if(data.duty.mark_problems_post  == "didnt publish" ){
                    $("#mark_problems_post_2").prop("checked", true);
                }
                else if(data.duty.mark_problems_post  == "published instead" ){
                    $("#mark_problems_post_3").prop("checked", true);
                }
                else if(data.duty.mark_problems_post  == "incomplete" ){
                    $("#mark_problems_post_4").prop("checked", true);
                    $('.mark_problems_post_standard').removeAttr('disabled');

                }
                //returning_ambassadors_post
                if(data.duty.returning_ambassadors_post  == "تم المتابعة" ){
                    $("#returning_ambassadors_post_1").prop("checked", true);
                }
                else if(data.duty.returning_ambassadors_post  == "تم المتابعة بعد 3 أيام" ){
                    $("#returning_ambassadors_post_2").prop("checked", true);
                }
                else if(data.duty.returning_ambassadors_post  == "لم تتم المتابعة" ){
                    $("#returning_ambassadors_post_3").prop("checked", true);
                }
                //new_ambassadors_post
                if(data.duty.new_ambassadors_post  == "تم المتابعة" ){
                    $("#new_ambassadors_post_1").prop("checked", true);
                }
                else if(data.duty.new_ambassadors_post  == "نقص في المتابعة" ){
                    $("#new_ambassadors_post_2").prop("checked", true);
                }
                //withdrawn_ambassadors_post
                if(data.duty.withdrawn_ambassadors_post  == "تم المتابعة" ){
                    $("#withdrawn_ambassadors_post_1").prop("checked", true);
                }
                else if(data.duty.withdrawn_ambassadors_post  == "تم المتابعة وتنبيه غير المتفاعلين" ){
                    $("#withdrawn_ambassadors_post_2").prop("checked", true);
                }
                else if(data.duty.withdrawn_ambassadors_post  == "لم تتم المتابعة" ){
                    $("#withdrawn_ambassadors_post_3").prop("checked", true);
                }
                //leader_training
                if(data.duty.leader_training  == "published" ){
                    $("#leader_training_1").prop("checked", true);
                }
                else if(data.duty.leader_training  == "didnt publish" ){
                    $("#leader_training_2").prop("checked", true);
                }
                else if(data.duty.leader_training  == "incomplete" ){
                    $("#leader_training_3").prop("checked", true);
                }
                else if(data.duty.leader_training  == "none" ){
                    $("#leader_training_4").prop("checked", true);
                }
                //discussion_post
                if(data.duty.discussion_post  == "published" ){
                    $("#discussion_post_1").prop("checked", true);
                }
                else if(data.duty.discussion_post  == "didnt publish" ){
                    $("#discussion_post_2").prop("checked", true);
                }
                else if(data.duty.discussion_post  == "incomplete" ){
                    $("#discussion_post_3").prop("checked", true);
                }
                else if(data.duty.discussion_post  == "none" ){
                    $("#discussion_post_4").prop("checked", true);
                }
                //criteria
                //follow_up_post_incomplete_1
            if(data.criteria_1 !=null){
                var follow_up_post_incomplete_1 = split_criteria(data.criteria_1.deficiencies);
                if(follow_up_post_incomplete_1 ){
                    for (var i = 0; i < follow_up_post_incomplete_1.length; i++){
                        if( document.getElementById('follow_up_post_incomplete_1').value == follow_up_post_incomplete_1[i]){
                            $("#follow_up_post_incomplete_1").prop("checked", true);
                        }
                        else if( document.getElementById('follow_up_post_incomplete_2').value == follow_up_post_incomplete_1[i]){
                            $("#follow_up_post_incomplete_2").prop("checked", true);
                        }
                        else if( document.getElementById('follow_up_post_incomplete_3').value == follow_up_post_incomplete_1[i]){
                            $("#follow_up_post_incomplete_3").prop("checked", true);
                        }
                        else if( document.getElementById('follow_up_post_incomplete_4').value == follow_up_post_incomplete_1[i]){
                            $("#follow_up_post_incomplete_4").prop("checked", true);
                        }
                        else if( document.getElementById('follow_up_post_incomplete_5').value == follow_up_post_incomplete_1[i]){
                            $("#follow_up_post_incomplete_5").prop("checked", true);
                        }
                        else if( document.getElementById('follow_up_post_incomplete_6').value == follow_up_post_incomplete_1[i]){
                            $("#follow_up_post_incomplete_6").prop("checked", true);
                        }
                        else if( document.getElementById('follow_up_post_incomplete_7').value == follow_up_post_incomplete_1[i]){
                            $("#follow_up_post_incomplete_7").prop("checked", true);
                        }
                    }
                }
            }
                //mark_problems_post_incomplete
            if(data.criteria_2 !=null){
                var mark_problems_post_incomplete = split_criteria(data.criteria_2.deficiencies);
                if(mark_problems_post_incomplete ){
                    for (var i = 0; i < mark_problems_post_incomplete.length; i++){
                        if( document.getElementById('mark_problems_post_incomplete_1').value == mark_problems_post_incomplete[i]){
                            $("#mark_problems_post_incomplete_1").prop("checked", true);
                        }
                        else if( document.getElementById('mark_problems_post_incomplete_2').value == mark_problems_post_incomplete[i]){
                            $("#mark_problems_post_incomplete_2").prop("checked", true);
                        }
                        else if( document.getElementById('mark_problems_post_incomplete_3').value == mark_problems_post_incomplete[i]){
                            $("#mark_problems_post_incomplete_3").prop("checked", true);
                        }
                        else if( document.getElementById('mark_problems_post_incomplete_4').value == mark_problems_post_incomplete[i]){
                            $("#mark_problems_post_incomplete_4").prop("checked", true);
                        }
                        else if( document.getElementById('mark_problems_post_incomplete_5').value == mark_problems_post_incomplete[i]){
                            $("#mark_problems_post_incomplete_5").prop("checked", true);
                        }
                    }
                }
            }
                //new_ambassadors_post_incomplete
                //see SupervisorDutyController 
                // var new_ambassadors_post_incomplete = split_criteria(data.criteria_3.deficiencies);
                // if(new_ambassadors_post_incomplete ){
                //     for (var i = 0; i < new_ambassadors_post_incomplete.length; i++){
                //         if( document.getElementById('new_ambassadors_post_incomplete_1').value == new_ambassadors_post_incomplete[i]){
                //             $("#new_ambassadors_post_incomplete_1").prop("checked", true);
                //         }
                //         else if( document.getElementById('new_ambassadors_post_incomplete_2').value == new_ambassadors_post_incomplete[i]){
                //             $("#new_ambassadors_post_incomplete_3").prop("checked", true);
                //         }
                //     }
                // }
                }      
           },
           error:function(){
                    alert("error");
           },
        });   

});
//####### END SELECT SUPERVISOR #######// 

//####### START DEFAULT VALUES #######// 
function default_values(){
    document.getElementById('leader_members').value = null;  
    document.getElementById('team_final_mark').value = null;  
    for(var i = 1;i<=4;i++){
        $("#follow_up_post_"+i).prop("checked", false);
        $("#mark_problems_post_"+i).prop("checked", false);
        $("#returning_ambassadors_post_"+i).prop("checked", false);
        $("#new_ambassadors_post_"+i).prop("checked", false); 
        $("#leader_training_"+i).prop("checked", false); 
        $("#discussion_post_"+i).prop("checked", false); 

    }
    for(var i = 1;i<=3;i++){
        $("#withdrawn_ambassadors_post_"+i).prop("checked", false);
    }
    
    for(var i = 1;i<=7;i++){
        $("#follow_up_post_incomplete_"+i).prop("checked", false);
    }
    for(var i = 1;i<=5;i++){
        $("#mark_problems_post_incomplete_"+i).prop("checked", false);
    }

}
//####### END DEFAULT VALUES #######// 

//####### START SPLIT CRITERIA #######// 

function split_criteria(str){
    var array = new Array();
    var deficiencies = str.split(",");
    return  deficiencies;
  }

//####### END SPLIT CRITERIA #######// 

//####### START leader_members VALIDATION #######// 
$("#leader_members").change(function () {
    if (!isLeaderMembersValid()) {
        if ($('#leader_members').val() === '') {
            $("#leader_members_required").css("display", "block");
            $("#leader_members_number").css("display", "none");
        } else {
            $("#leader_members_number").css("display", "block");
            $("#leader_members_required").css("display", "none");
        }
    } else {
        $("#leader_members_required").css("display", "none");
        $("#leader_members_number").css("display", "none");

    }
});

function isLeaderMembersValid() {
    return ($('#leader_members').val() != '' && $.isNumeric($('#leader_members').val()));
}

//####### END leader_members VALIDATION #######// 

//####### START team_final_mark VALIDATION #######// 
$("#team_final_mark").change(function () {
    if (!isTeamFinalMarkValid()) {
        if ($('#team_final_mark').val() === '') {
            $("#team_final_mark_required").css("display", "block");
            $("#team_final_mark_number").css("display", "none");
        } else {
            $("#team_final_mark_number").css("display", "block");
            $("#team_final_mark_required").css("display", "none");
        }
    } else {
        $("#team_final_mark_required").css("display", "none");
        $("#team_final_mark_number").css("display", "none");

    }
});

function isTeamFinalMarkValid() {
    return ($('#team_final_mark').val() != '' && $.isNumeric($('#team_final_mark').val()));
}
//####### END team_final_mark VALIDATION #######// 

//####### START follow_up_post VALIDATION #######// 
$('input[name="follow_up_post"]').click(function () {
    if ($('#follow_up_post_4').is(':checked')) {
        $('.follow_up_post_standard').removeAttr('disabled');
        $("#follow_up_post_incomplete_required").css("display", "block");
    } else {

        $('.follow_up_post_standard').prop('checked', false);
        $('.follow_up_post_standard').attr('disabled', 'disabled');
        $("#follow_up_post_incomplete_required").css("display", "none");
    }

});

function isFollowUpPostValid() {
    if ($('input[name="follow_up_post"]:checked').length <= 0) {
        $("#follow_up_post_required").css("display", "block");
        return false;
    } else if ($('#follow_up_post_4').is(':checked')) {
        if ($('input[name="follow_up_post_incomplete[]"]:checked').length <= 0) {
            return false;
        } else {
            return true;
        }
    } else {
        return true
    }
}

//####### END follow_up_post VALIDATION #######// 

//####### START mark_problems_post VALIDATION #######// 
$('[name="mark_problems_post"]').click(function () {
    if ($('#mark_problems_post_4').is(':checked')) {
        $('.mark_problems_post_standard').removeAttr('disabled');
        $("#mark_problems_post_incomplete_required").css("display", "block");
    } else {
        $('.mark_problems_post_standard').prop('checked', false);
        $('.mark_problems_post_standard').attr('disabled', 'disabled');
        $("#mark_problems_post_incomplete_required").css("display", "none");
    }

});

function isMarkProblemsPostValid() {
    if ($('input[name="mark_problems_post"]:checked').length <= 0) {
        $("#mark_problems_post_required").css("display", "block");
        return false;
    } else if ($('#mark_problems_post_4').is(':checked')) {
        if ($('input[name="mark_problems_post_incomplete[]"]:checked').length <= 0) {
            return false;
        } else {
            return true;
        }
    } else {
        return true
    }
}
//####### END mark_problems_post VALIDATION #######// 

//####### START returning_ambassadors_post VALIDATION #######// 
function isReturningAmbassadorsPostValid() {
    if ($('input[name="returning_ambassadors_post"]:checked').length <= 0) {
        $("#returning_ambassadors_post_required").css("display", "block");
        return false;
    } else {
        $("#returning_ambassadors_post_required").css("display", "none");
        return true
    }
}
//####### END returning_ambassadors_post VALIDATION #######// 


//####### START new_ambassadors_post VALIDATION #######// 
$('[name="new_ambassadors_post"]').click(function () {
    if ($('#new_ambassadors_post_2').is(':checked')) {
        $('.new_ambassadors_post_standard').removeAttr('disabled');
        $("#new_ambassadors_post_incomplete_required").css("display", "block");
    } else {
        $('.new_ambassadors_post_standard').prop('checked', false);
        $('.new_ambassadors_post_standard').attr('disabled', 'disabled');
        $("#new_ambassadors_post_incomplete_required").css("display", "none");
    }

});

function isNewAmbassadorsPostValid() {
    if ($('input[name="new_ambassadors_post"]:checked').length <= 0) {
        $("#new_ambassadors_post_required").css("display", "block");

        return false;
    } else if ($('#new_ambassadors_post_2').is(':checked')) {
        if ($('input[name="new_ambassadors_post_incomplete[]"]:checked').length <= 0) {
            return false;
        } else {
            return true;
        }
    } else {
        return true
    }
}

//####### END new_ambassadors_post VALIDATION #######// 


//####### START withdrawn_ambassadors_post VALIDATION #######// 
function isWithdrawnAmbassadorsPostValid() {
    if ($('input[name="withdrawn_ambassadors_post"]:checked').length <= 0) {
        $("#withdrawn_ambassadors_post_required").css("display", "block");
        return false;
    } else {
        $("#withdrawn_ambassadors_post_required").css("display", "none");
        return true
    }
}
//####### END withdrawn_ambassadors_post VALIDATION #######// 

//####### discussion_post VALIDATION #######// 
function isDiscussionPostValid() {
    if ($('input[name="discussion_post"]:checked').length <= 0) {
        $("#discussion_post_required").css("display", "block");
        return false;
    } else {
        $("#discussion_post_required").css("display", "none");
        return true
    }
}
//####### END discussion_post VALIDATION #######// 

//####### START leader_training VALIDATION #######// 
function isLeaderTrainingValid() {
    if ($('input[name="leader_training"]:checked').length <= 0) {
        $("#leader_training_required").css("display", "block");
        return false;
    } else {
        $("#leader_training_required").css("display", "none");
        return true
    }
}
//####### END leader_training VALIDATION #######// 


//####### START INCOMPLETE MESSAGES CONTROL #######// 

$('input[name="follow_up_post_incomplete[]"]').click(function () {
    if ($('input[name="follow_up_post_incomplete[]"]:checked').length <= 0) {

        $("#follow_up_post_incomplete_required").css("display", "block");
    } else {
        $("#follow_up_post_incomplete_required").css("display", "none");
    }
});

$('input[name="mark_problems_post_incomplete[]"]').click(function () {
    if ($('input[name="mark_problems_post_incomplete[]"]:checked').length <= 0) {

        $("#mark_problems_post_incomplete_required").css("display", "block");
    } else {
        $("#mark_problems_post_incomplete_required").css("display", "none");
    }
});

$('input[name="new_ambassadors_post_incomplete[]"]').click(function () {
    if ($('input[name="new_ambassadors_post_incomplete[]"]:checked').length <= 0) {

        $("#new_ambassadors_post_incomplete_required").css("display", "block");
    } else {
        $("#new_ambassadors_post_incomplete_required").css("display", "none");
    }
});

//####### END INCOMPLETE MESSAGES CONTROL #######// 



document.querySelector('#form').addEventListener('submit', function (e) {

    // prevent the form from submitting
    e.preventDefault();

    //check validation
    if (
        isLeaderMembersValid() &&
        isTeamFinalMarkValid() &&
        isFollowUpPostValid() &&
        isMarkProblemsPostValid() &&
        isReturningAmbassadorsPostValid() &&
        isNewAmbassadorsPostValid() &&
        isWithdrawnAmbassadorsPostValid() &&
        isDiscussionPostValid()
    ) {
        $(this).submit();

    }
else{
    isLeaderMembersValid() ;
    isTeamFinalMarkValid() ;
    isFollowUpPostValid() ;
    isMarkProblemsPostValid() ;
    isReturningAmbassadorsPostValid() ;
    isNewAmbassadorsPostValid() ;
    isWithdrawnAmbassadorsPostValid() ;
    isDiscussionPostValid();
    console.log('hi');
}

});
