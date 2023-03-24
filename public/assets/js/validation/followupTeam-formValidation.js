$(document).ready(function () {
    let valid = false;
    //Disable Standards Checkbox
    $('.follow_up_post_standard').attr('disabled', 'disabled');
    $('.about_asboha_post_standard').attr('disabled', 'disabled');
    $('.new_ambassadors_post_standard').attr('disabled', 'disabled');
});
//####### START SELECT SUPERVISOR #######// 

$("#select_form").change(function () {
    default_values();
    $("#leader_OR_supervisor_id").val($("#select_form").find(":selected").val());
    
    var leader_OR_supervisor_id = $("#leader_OR_supervisor_id").val();

    $("#followup_team_duties_form").show();
    $("#leaders_duties_image").hide();    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    if(document.getElementById('leader_OR_supervisor_id').name == "leader_id"){

        var data = {
            leader_id : leader_OR_supervisor_id,
           
        };
        var  url ='leader_show';
    }
    else  if(document.getElementById('leader_OR_supervisor_id').name == "supervisor_id"){

        var data = {
            supervisor_id : leader_OR_supervisor_id,
        }
        var  url ='supervisor_show';
    }
    $.ajax({
           type:'POST',
           data:data,
           url:url,
           success:function(data){
            if(data.duty !=null){
            document.getElementById('team_members').value =data.duty.team_members;
            document.getElementById('team_final_mark').value =data.duty.team_final_mark;
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
            //about_asboha_post
            if(data.duty.about_asboha_post  == "published" ){
                $("#about_asboha_post_1").prop("checked", true);
            }
            else if(data.duty.follow_up_post  == "didnt publish" ){
                $("#about_asboha_post_2").prop("checked", true);
            }
             else if(data.duty.follow_up_post  == "published instead" ){
                $("#about_asboha_post_3").prop("checked", true);
            }
             else if(data.duty.follow_up_post  == "incomplete" ){
                $("#about_asboha_post_4").prop("checked", true);
                $('.about_asboha_post_standard').removeAttr('disabled');

            }
            //zero_mark

             if(data.duty.zero_mark  > 0 ){
                $("#zero_mark_1").prop("checked", true);
                $('.zero_mark_NO').removeAttr('disabled');
                document.getElementById('zero_mark_NO').value =data.duty.zero_mark;


            }

            else if(data.duty.zero_mark  == 0 ){
                $("#zero_mark_2").prop("checked", true);
            }
            //frozen_ambassadors
             if(data.duty.frozen_ambassadors  > 0 ){
                $("#frozen_ambassadors_1").prop("checked", true);
                $('.frozen_ambassadors_NO').removeAttr('disabled');
                document.getElementById('frozen_ambassadors_NO').value =data.duty.frozen_ambassadors;


            }
            else if(data.duty.frozen_ambassadors  == 0 ){
                $("#frozen_ambassadors_2").prop("checked", true);
            }
            //thursday_task
            if(data.duty.thursday_task  == "1" ){
                $("#thursday_task_1").prop("checked", true);
            }
            else if(data.duty.thursday_task  == "0" ){
                $("#thursday_task_2").prop("checked", true);
            }
            
            //friday_task
            if(data.duty.friday_task  == "1" ){
                $("#friday_task_1").prop("checked", true);
            }
            else if(data.duty.thursday_task  == "0" ){
                $("#friday_task_2").prop("checked", true);
            }
            //discussion_post
            if(data.duty.discussion_post  == "published" ){
                $("#discussion_post_1").prop("checked", true);
            }
            else if(data.duty.follow_up_post  == "didnt publish" ){
                $("#discussion_post_2").prop("checked", true);
            }
             else if(data.duty.follow_up_post  == "incomplete" ){
                $("#discussion_post_3").prop("checked", true);
            }
             else if(data.duty.follow_up_post  == "none" ){
                $("#discussion_post_4").prop("checked", true);
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
            //final_mark
            if(data.duty.final_mark  == "published" ){
                $("#final_mark_1").prop("checked", true);
            }
            else if(data.duty.final_mark  == "didnt publish" ){
                $("#final_mark_2").prop("checked", true);
            }
            else if(data.duty.final_mark  == "published instead" ){
                $("#final_mark_3").prop("checked", true);
            }
            //audit_final_mark
            if(data.duty.audit_final_mark  == "done" ){
                $("#audit_final_mark_1").prop("checked", true);
                $('.audit_leader_messaging_standard').removeAttr('disabled');

            }
            else if(data.duty.audit_final_mark  == "not done" ){
                $("#audit_final_mark_2").prop("checked", true);
            }
            else if(data.duty.audit_final_mark  == "untargeted" ){
                $("#audit_final_mark_3").prop("checked", true);
            }
            //withdrawn_ambassadors
             if(data.duty.withdrawn_ambassadors  == "done" ){
                $("#withdrawn_ambassadors_1").prop("checked", true);
                $('#withdrawn_ambassadors_No').removeAttr('disabled');
                document.getElementById('withdrawn_ambassadors_No').value =data.duty.withdrawn_ambassadors_No;


            }
            else if(data.duty.withdrawn_ambassadors  == "not done" ){
                $("#withdrawn_ambassadors_2").prop("checked", true);
                $('#withdrawn_ambassadors_message').removeAttr('disabled');

            }
            else if(data.duty.withdrawn_ambassadors  == "no withdrawal" ){
                $("#withdrawn_ambassadors_3").prop("checked", true);
            }
             //leader_reading
             if(data.duty.leader_reading  == "read" ){
                $("#leader_reading_1").prop("checked", true);
            }
            else if(data.duty.leader_reading  == "not read" ){
                $("#leader_reading_2").prop("checked", true);
            }
            else if(data.duty.leader_reading  == "late" ){
                $("#leader_reading_3").prop("checked", true);
            }
            else if(data.duty.leader_reading  == "didnt vote" ){
                $("#leader_reading_4").prop("checked", true);
            }

             
            //criteria
            //deficiencies_follow_up_post
            var deficiencies_follow_up_post = split_criteria(data.criteria_1.deficiencies);
            if(deficiencies_follow_up_post ){
                for (var i = 0; i < deficiencies_follow_up_post.length; i++){
                if( document.getElementById('follow_up_post_incomplete_1').value == deficiencies_follow_up_post[i]){
                    $("#follow_up_post_incomplete_1").prop("checked", true);
                }
                else if( document.getElementById('follow_up_post_incomplete_2').value == deficiencies_follow_up_post[i]){
                    $("#follow_up_post_incomplete_2").prop("checked", true);
                }
                else if( document.getElementById('follow_up_post_incomplete_3').value == deficiencies_follow_up_post[i]){
                    $("#follow_up_post_incomplete_3").prop("checked", true);
                }
                else if( document.getElementById('follow_up_post_incomplete_4').value == deficiencies_follow_up_post[i]){
                    $("#follow_up_post_incomplete_4").prop("checked", true);
                }
                else if( document.getElementById('follow_up_post_incomplete_5').value == deficiencies_follow_up_post[i]){
                    $("#follow_up_post_incomplete_5").prop("checked", true);
                }
                else if( document.getElementById('follow_up_post_incomplete_6').value == deficiencies_follow_up_post[i]){
                    $("#follow_up_post_incomplete_6").prop("checked", true);
                }
                else if( document.getElementById('follow_up_post_incomplete_7').value == deficiencies_follow_up_post[i]){
                    $("#follow_up_post_incomplete_7").prop("checked", true);
                }
                else if( document.getElementById('follow_up_post_incomplete_8').value == deficiencies_follow_up_post[i]){
                    $("#follow_up_post_incomplete_8").prop("checked", true);
                }
            }
            }
            //about_asboha_post
            var about_asboha_post = split_criteria(data.criteria_2.deficiencies);
            if(about_asboha_post ){
                for (var i = 0; i < about_asboha_post.length; i++){
                if( document.getElementById('about_asboha_post_incomplete_1').value == about_asboha_post[i]){
                    $("#about_asboha_post_incomplete_1").prop("checked", true);
                }
                else if( document.getElementById('about_asboha_post_incomplete_2').value == about_asboha_post[i]){
                    $("#about_asboha_post_incomplete_2").prop("checked", true);
                }
                else if( document.getElementById('about_asboha_post_incomplete_3').value == about_asboha_post[i]){
                    $("#about_asboha_post_incomplete_3").prop("checked", true);
                }
                else if( document.getElementById('about_asboha_post_incomplete_4').value == about_asboha_post[i]){
                    $("#about_asboha_post_incomplete_4").prop("checked", true);
                }
            }
            }
        }      
           },
           error:function(){
                    alert("error");
           },
        });      
        
});
function default_values(){
        document.getElementById('team_members').value = null;
        document.getElementById('team_final_mark').value =null;
        

        //follow_up_post
            $("#follow_up_post_1").prop("checked", false);
            $("#follow_up_post_2").prop("checked", false);
            $("#follow_up_post_3").prop("checked", false);
            $("#follow_up_post_4").prop("checked", false);
       
        //about_asboha_post
            $("#about_asboha_post_1").prop("checked", false);
            $("#about_asboha_post_2").prop("checked", false);
            $("#about_asboha_post_3").prop("checked", false);
            $("#about_asboha_post_4").prop("checked", false);
        //zero_mark
            $("#zero_mark_1").prop("checked", false);
            $("#zero_mark_2").prop("checked", false);
            document.getElementById('zero_mark_NO').value =null;

        //frozen_ambassadors
            $("#frozen_ambassadors_1").prop("checked", false);
            $("#frozen_ambassadors_2").prop("checked", false);
            document.getElementById('frozen_ambassadors_NO').value =null;

        //thursday_task
            $("#thursday_task_1").prop("checked", false);
            $("#thursday_task_2").prop("checked", false);
        //friday_task
            $("#friday_task_1").prop("checked", false);
            $("#friday_task_2").prop("checked", false);
        //discussion_post
            $("#discussion_post_1").prop("checked", false);
            $("#discussion_post_2").prop("checked", false);
            $("#discussion_post_3").prop("checked", false);
            $("#discussion_post_4").prop("checked", false);
        //leader_training
            $("#leader_training_1").prop("checked", false);
            $("#leader_training_2").prop("checked", false);
            $("#leader_training_3").prop("checked", false);
            $("#leader_training_4").prop("checked", false);
        //final_mark
            $("#final_mark_1").prop("checked", false);
            $("#final_mark_2").prop("checked", false);
            $("#final_mark_3").prop("checked", false);
        //audit_final_mark
            $("#audit_final_mark_1").prop("checked", false);
            document.getElementById('withdrawn_ambassadors_No').value =null;

            $("#audit_final_mark_2").prop("checked", false);
            $("#audit_final_mark_3").prop("checked", false);
        //withdrawn_ambassadors
            $("#withdrawn_ambassadors_1").prop("checked", false);
            document.getElementById('withdrawn_ambassadors_No').value =null;

            $("#withdrawn_ambassadors_2").prop("checked", false);
            $("#withdrawn_ambassadors_3").prop("checked", false);
         //leader_reading
            $("#leader_reading_1").prop("checked", false);
            $("#leader_reading_2").prop("checked", false);
            $("#leader_reading_3").prop("checked", false);
            $("#leader_reading_4").prop("checked", false);
         
        //criteria
        //deficiencies_follow_up_post
        $(".follow_up_post_standard").prop("checked", false);
        //about_asboha_post
        $(".about_asboha_post_standard").prop("checked", false);

    
}
function split_criteria(str){
    var array = new Array();
    var deficiencies = str.split(",");
    return  deficiencies;
  }

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
        $("#zero_mark_NO_required").css("display", "block");

    } else {
        $('#zero_mark_NO').val('');
        $('.zero_mark_NO').attr('disabled', 'disabled');
        $("#zero_mark_NO_required").css("display", "none");

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
        $("#frozen_ambassadors_NO_required").css("display", "block");
    } else {
        $('#frozen_ambassadors_NO').val('');
        $('.frozen_ambassadors_NO').attr('disabled', 'disabled');
        $("#frozen_ambassadors_NO_required").css("display", "none");
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
//####### END final_mark VALIDATION #######// 

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


//####### START final_mark VALIDATION #######// 
$('[name="final_mark"]').click(function () {
    $("#final_mark_required").css("display", "none");
});
function isFinalMarkValid() {
    if ($('input[name="final_mark"]:checked').length <= 0) {
        $("#final_mark_required").css("display", "block");
        return false;
    } else {
        $("#final_mark_required").css("display", "none");
        return true
    }
}
//####### END final_mark VALIDATION #######// 

//####### START audit_final_mark VALIDATION #######// 
$('[name="audit_final_mark"]').click(function () {
    $("#audit_final_mark_required").css("display", "none");
    if ($('#audit_final_mark_1').is(':checked')) {
        $('.audit_leader_messaging_standard').removeAttr('disabled');
    } else {
        $('.audit_leader_messaging_standard').prop('checked', false);
        $('.audit_leader_messaging_standard').attr('disabled', 'disabled');
    }
});
function isAuditFinalMarkValid() {
    if ($('input[name="audit_final_mark"]:checked').length <= 0) {
        $("#audit_final_mark_required").css("display", "block");
        return false;
    } else {
        $("#audit_final_mark_required").css("display", "none");
        return true
    }
}
//####### END audit_final_mark VALIDATION #######// 

//####### START withdrawn_ambassadors VALIDATION #######// 
$('[name="withdrawn_ambassadors"]').click(function () {
    $("#withdrawn_ambassadors_required").css("display", "none");

    if ($('#withdrawn_ambassadors_1').is(':checked')) {
        isWithdrawnAmbassadorsNoValid();
        $('#withdrawn_ambassadors_No').removeAttr('disabled');
        $('#withdrawn_ambassadors_message').attr('disabled', 'disabled');

        
    } else if ($('#withdrawn_ambassadors_2').is(':checked')){
        $('#withdrawn_ambassadors_message').removeAttr('disabled');
        $('#withdrawn_ambassadors_No').attr('disabled', 'disabled');

    } else {
        $('#withdrawn_ambassadors_No').val('');
        $('#withdrawn_ambassadors_No').attr('disabled', 'disabled');
        $('#withdrawn_ambassadors_message').val('');
        $('#withdrawn_ambassadors_message').attr('disabled', 'disabled');
    }
});

$("#withdrawn_ambassadors_No").change(function () {
    if (!isWithdrawnAmbassadorsNoValid()) {
        if ($('#withdrawn_ambassadors_No').val() === '') {
            $("#withdrawn_ambassadors_No_required").css("display", "block");
            $("#withdrawn_ambassadors_No_number").css("display", "none");
        } else {
            $("#withdrawn_ambassadors_No_number").css("display", "block");
            $("#withdrawn_ambassadors_No_required").css("display", "none");
        }
    } else {
        $("#withdrawn_ambassadors_No_required").css("display", "none");
        $("#withdrawn_ambassadors_No_number").css("display", "none");
    }
});

function isWithdrawnAmbassadorsNoValid() {
    return ($('#withdrawn_ambassadors_No').val() != '' && $.isNumeric($('#withdrawn_ambassadors_No').val()));
}

function isWithdrawnAmbassadorsValid() {
    if ($('input[name="withdrawn_ambassadors"]:checked').length <= 0) {
        $("#withdrawn_ambassadors_required").css("display", "block");
        return false;
    } else {
        $("#withdrawn_ambassadors_required").css("display", "none");
        return true
    }
}

//####### END withdrawn_ambassadors VALIDATION #######// 

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
    isLeaderReadingValid()
    $("#leader_reading_required").css("display", "none");
});

function isLeaderReadingValid() {
    if ($('input[name="leader_reading"]:checked').length <= 0) {
        $("#leader_reading_required").css("display", "block");
        return false;
    }
    else {
        $("#leader_reading_required").css("display", "none");
        return true
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
        isLeaderTrainingValid() &&
        isFinalMarkValid() &&
        isAuditFinalMarkValid() &&
        isWithdrawnAmbassadorsValid() &&
        isLeaderReadingValid()
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
        isFinalMarkValid();
        isAuditFinalMarkValid();
        isWithdrawnAmbassadorsValid();
        isLeaderReadingValid();
    }

});
