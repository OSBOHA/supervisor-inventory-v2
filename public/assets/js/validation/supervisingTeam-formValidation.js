
$(document).ready(function () {
    let valid = false;
    //Disable Standards Checkbox
    $('.follow_up_post_standard').attr('disabled', 'disabled');
    $('.mark_problems_post_standard').attr('disabled', 'disabled');
    $('.new_ambassadors_post_standard').attr('disabled', 'disabled');
});

//####### START SELECT SUPERVISOR #######// 

$("#select_form").change(function () {
    $("#supervisor_id").val($("#select_form").find(":selected").val());
    $("#supervisor_duties_form").show();
    $("#super_duties_image").hide();

});
//####### END SELECT SUPERVISOR #######// 

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
