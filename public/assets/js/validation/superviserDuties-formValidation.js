
//####### START SELECT SUPERVISOR #######// 

$("#select_form").change(function () {
    $("#supervisor_id").val($("#select_form").find(":selected").val());
    $("#super_duties_form").show();
    $("#super_duties_image").hide();

});
//####### END SELECT SUPERVISOR #######// 

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
