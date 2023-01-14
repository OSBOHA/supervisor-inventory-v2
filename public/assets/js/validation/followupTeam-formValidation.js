
$(document).ready(function () {
    let valid = false;
    //Disable Standards Checkbox
    $('.follow_up_post_standard').attr('disabled', 'disabled');
    $('.about_asboha_post_standard').attr('disabled', 'disabled');
    $('.new_ambassadors_post_standard').attr('disabled', 'disabled');
});

//####### START SELECT SUPERVISOR #######// 

$("#select_form").change(function () {
    $("#leader_id").val($("#select_form").find(":selected").val());
    $("#followup_team_duties_form").show();
    $("#leaders_duties_image").hide();

});
//####### END SELECT SUPERVISOR #######// 

//####### START team_members VALIDATION #######// 
$("#team_members").change(function () {
    isTeamMembersValid();
});

function isTeamMembersValid() {
    if ($('#team_members').val() === '') {
        $("#team_members_required").css("display", "block");
        $("#team_members_number").css("display", "none");
        return false;
    } 
    else if(! $.isNumeric($('#team_members').val())) {
        $("#team_members_number").css("display", "block");
        $("#team_members_required").css("display", "none");
        return false;
    }
    else {
    $("#team_members_required").css("display", "none");
    $("#team_members_number").css("display", "none");
    return true;
}
}

//####### END team_members VALIDATION #######// 

//####### START team_final_mark VALIDATION #######// 
$("#team_final_mark").change(function () {
    isTeamFinalMarkValid();
});

function isTeamFinalMarkValid() {
    if ($('#team_final_mark').val() === '') {
        $("#team_final_mark_required").css("display", "block");
        $("#team_final_mark_number").css("display", "none");
        return false;
    } 
    else if(! $.isNumeric($('#team_final_mark').val())) {
        $("#team_final_mark_number").css("display", "block");
        $("#team_final_mark_required").css("display", "none");
        return false;
    }
    else {
    $("#team_final_mark_required").css("display", "none");
    $("#team_final_mark_number").css("display", "none");
    return true;
}
}

//####### END team_final_mark VALIDATION #######// 

//####### START follow_up_post VALIDATION #######// 
$('input[name="follow_up_post"]').click(function () {
    $("#follow_up_post_required").css("display", "none");

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

//####### START about_asboha_post VALIDATION #######// 
$('[name="about_asboha_post"]').click(function () {
    $("#about_asboha_post_required").css("display", "none");
    if ($('#about_asboha_post_4').is(':checked')) {
        $('.about_asboha_post_standard').removeAttr('disabled');
        $("#about_asboha_post_incomplete_required").css("display", "block");
    } else {
        $('.about_asboha_post_standard').prop('checked', false);
        $('.about_asboha_post_standard').attr('disabled', 'disabled');
        $("#about_asboha_post_incomplete_required").css("display", "none");
    }

});

function isAboutAsbohaPostValid() {
    if ($('input[name="about_asboha_post"]:checked').length <= 0) {
        $("#about_asboha_post_required").css("display", "block");
        return false;
    } else if ($('#about_asboha_post_4').is(':checked')) {
        if ($('input[name="about_asboha_post_incomplete[]"]:checked').length <= 0) {
            return false;
        } else {
            return true;
        }
    } else {
        return true
    }
}
//####### END about_asboha_post VALIDATION #######// 

//####### START zero_mark VALIDATION #######// 
$('[name="zero_mark"]').click(function () {
    $("#zero_mark_required").css("display", "none");

    if ($('#zero_mark_1').is(':checked')) {
        isZerosNoValid()
        $('.zero_mark_NO').removeAttr('disabled');
    } else {
        $('#zero_mark_NO').val('');
        $('.zero_mark_NO').attr('disabled', 'disabled');
    }
});
$("#zero_mark_NO").change(function () {
    if (!isZerosNoValid()) {
        if ($('#zero_mark_NO').val() === '') {
            $("#zero_mark_NO_required").css("display", "block");
            $("#zero_mark_NO_number").css("display", "none");
        } else {
            $("#zero_mark_NO_number").css("display", "block");
            $("#zero_mark_NO_required").css("display", "none");
        }
    } else {
        $("#zero_mark_NO_required").css("display", "none");
        $("#zero_mark_NO_number").css("display", "none");
    }
});

function isZerosNoValid() {
    return ($('#zero_mark_NO').val() != '' && $.isNumeric($('#zero_mark_NO').val()));
}

function isZerosValid() {
    if ($('input[name="zero_mark"]:checked').length <= 0) {
        $("#zero_mark_required").css("display", "block");
        return false;
    } else {
        $("#zero_mark_required").css("display", "none");
        return true
    }
}


//####### END zero_mark VALIDATION #######// 

//####### START frozen_ambassadors VALIDATION #######// 
$('[name="frozen_ambassadors"]').click(function () {
    $("#frozen_ambassadors_required").css("display", "none");

    if ($('#frozen_ambassadors_1').is(':checked')) {
        isFrozenNoValid()
        $('.frozen_ambassadors_NO').removeAttr('disabled');
    } else {
        $('#frozen_ambassadors_NO').val('');
        $('.frozen_ambassadors_NO').attr('disabled', 'disabled');
    }
});
$("#frozen_ambassadors_NO").change(function () {
    if (!isFrozenNoValid()) {
        if ($('#frozen_ambassadors_NO').val() === '') {
            $("#frozen_ambassadors_NO_required").css("display", "block");
            $("#frozen_ambassadors_NO_number").css("display", "none");
        } else {
            $("#frozen_ambassadors_NO_number").css("display", "block");
            $("#frozen_ambassadors_NO_required").css("display", "none");
        }
    } else {
        $("#frozen_ambassadors_NO_required").css("display", "none");
        $("#frozen_ambassadors_NO_number").css("display", "none");
    }
});

function isFrozenNoValid() {
    return ($('#frozen_ambassadors_NO').val() != '' && $.isNumeric($('#frozen_ambassadors_NO').val()));
}

function isFrozenValid() {
    if ($('input[name="frozen_ambassadors"]:checked').length <= 0) {
        $("#frozen_ambassadors_required").css("display", "block");
        return false;
    } else {
        $("#frozen_ambassadors_required").css("display", "none");
        return true
    }
}


//####### END frozen_ambassadors VALIDATION #######// 






//####### START thursday_task VALIDATION #######// 
$('[name="thursday_task"]').click(function () {
    $("#thursday_task_required").css("display", "none");
});
function isThursdayTaskValid() {
    if ($('input[name="thursday_task"]:checked').length <= 0) {
        $("#thursday_task_required").css("display", "block");
        return false;
    } else {
        $("#thursday_task_required").css("display", "none");
        return true
    }
}
//####### END thursday_task VALIDATION #######// 

//####### START friday_task VALIDATION #######// 
$('[name="friday_task"]').click(function () {
    $("#friday_task_required").css("display", "none");
});
function isFridayTaskValid() {
    if ($('input[name="friday_task"]:checked').length <= 0) {
        $("#friday_task_required").css("display", "block");
        return false;
    } else {
        $("#friday_task_required").css("display", "none");
        return true
    }
}
//####### END friday_task VALIDATION #######// 


//####### START discussion_post VALIDATION #######// 
$('[name="discussion_post"]').click(function () {
    $("#discussion_post_required").css("display", "none");
});
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
$('[name="leader_training"]').click(function () {
    $("#leader_training_required").css("display", "none");
});
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

$('input[name="about_asboha_post_incomplete[]"]').click(function () {
    if ($('input[name="about_asboha_post_incomplete[]"]:checked').length <= 0) {

        $("#about_asboha_post_incomplete_required").css("display", "block");
    } else {
        $("#about_asboha_post_incomplete_required").css("display", "none");
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


//####### START leader_reading VALIDATION #######// 
$('input[name="leader_reading"]').click(function () {
    isSupervisorReadingValid()
});

function isLeaderReadingValid() {
    if ($('input[name="leader_reading"]:checked').length <= 0) {
        $("#leader_reading_required").css("display", "block");
    }
    else {
        $("#leader_reading_required").css("display", "none");
    }
}
//####### END leader_reading VALIDATION #######// 


document.querySelector('#form').addEventListener('submit', function (e) {

    // prevent the form from submitting
    e.preventDefault();

    //check validation
    if (
        isTeamMembersValid() &&
        isTeamFinalMarkValid() &&
        isFollowUpPostValid() &&
        isAboutAsbohaPostValid() &&
        isZerosValid() &&
        isFrozenValid() &&
        isThursdayTaskValid() &&
        isFridayTaskValid() &&
        isDiscussionPostValid() &&
        isLeaderTrainingValid()
    ) {
        $(this).submit();

    }
    else {
        isTeamMembersValid();
        isTeamFinalMarkValid();
        isFollowUpPostValid();
        isAboutAsbohaPostValid();
        isZerosValid();
        isFrozenValid();
        isThursdayTaskValid();
        isFridayTaskValid();
        isDiscussionPostValid();
        isLeaderTrainingValid();

        console.log('error')
    }

});
