
//####### START SELECT SUPERVISOR #######// 

$("#select_form").change(function () {

    default_values();
    $("#supervisor_id").val($("#select_form").find(":selected").val());
    $("#super_duties_form").show();
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
            //follow_up_post
            if(data.duty.thursday_task  == "1" ){
                $("#checkbox1").prop("checked", true);
            }
            //final_mark_confirm
            if(data.duty.final_mark_confirm  == 1){
                $("#checkbox2").prop("checked", true);
            }
            //final_mark_screenshot
            if(data.duty.final_mark_screenshot  == 1 ){
                $("#checkbox3").prop("checked", true);
            }
            //supervisor_reading
            if(data.duty.supervisor_reading  == "read" ){
                $("#supervisor_reading_1").prop("checked", true);
            }
            else if(data.duty.supervisor_reading  == "not read" ){
                $("#supervisor_reading_2").prop("checked", true);
            }
             else if(data.duty.supervisor_reading  == "late" ){
                $("#supervisor_reading_3").prop("checked", true);
            }
             else if(data.duty.supervisor_reading  == "didnt vote" ){
                $("#supervisor_reading_4").prop("checked", true);
            }
            //
            document.getElementById('no_of_pages').value = data.duty.no_of_pages;
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
        $("#thursday_task").prop("checked", false);
        $("#final_mark_confirm").prop("checked", false);
        $("#final_mark_screenshot").prop("checked", false);
        $("#supervisor_reading_1").prop("checked", false);
        $("#supervisor_reading_2").prop("checked", false);
        $("#supervisor_reading_3").prop("checked", false);
        $("#supervisor_reading_4").prop("checked", false);
        document.getElementById('no_of_pages').value = null;  
}
//####### END DEFAULT VALUES #######// 


//####### START no_of_pages VALIDATION #######// 
$("#no_of_pages").change(function () {
    if (!isNoOfPagesValid()) {
        $("#no_of_pages_number").css("display", "block");
    } else {
        $("#no_of_pages_number").css("display", "none");

    }
});

function isNoOfPagesValid() {
    return $.isNumeric($('#no_of_pages').val());
}

//####### END no_of_pages VALIDATION #######// 


//####### START supervisor_reading VALIDATION #######// 
$('input[name="supervisor_reading"]').click(function () {
    isSupervisorReadingValid()
});

function isSupervisorReadingValid() {
    if ($('input[name="supervisor_reading"]:checked').length <= 0) {
        $("#supervisor_reading_required").css("display", "block");
    } 
    else{
        $("#supervisor_reading_required").css("display", "none");
    } 
}
//####### END supervisor_reading VALIDATION #######// 


document.querySelector('#form').addEventListener('submit', function (e) {

    // prevent the form from submitting
    e.preventDefault();

    //check validation
    if (
        isSupervisorReadingValid() &&
        isNoOfPagesValid()
        ) {
        $(this).submit();
    }
    else {
        console.log('error')
    }

});
