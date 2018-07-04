$(function () {
    $("select[required]").css({
        display: "block",
        height: 0,
        padding: 0,
        width: 0,
        position: 'absolute'
    });

    M.AutoInit();

    showTab(0); // Display the crurrent tab
});

var currentTab = 0; // Current tab is set to be the first tab (0)
var x = $(".tab"); //All the tabs in the form

function showTab(n) {
    // This function will display the specified tab of the form...
    x.eq(n).slideDown(600);


    //... and fix the Previous/Next buttons:
    if (n == 0) {
        $("#prevBtn").hide();
    } else {
        $("#prevBtn").show();
    }
    if (n == (x.length - 1)) {
        $("#nextBtn").html("Send<i class='material-icons right'>send</i>");
    } else {
        $("#nextBtn").html("Next<i class='medium material-icons right'>chevron_right</i>");
    }
    //... and run a function that will display the correct step indicator:
    fixStepIndicator(n);
}

function nextPrev(n) {
    // Exit the function if any field in the current tab is invalid:
    if (n == 1 && !validateForm()) return false;

    // Hide the current tab:
    x.eq(currentTab).slideUp(800);

    // Increase or decrease the current tab by 1:
    currentTab += n;

    // if you have reached the end of the form...
    if (currentTab >= x.length) {
        // ... the form gets submitted:
        $("#regForm").submit();
        return false;
    }
    // Otherwise, display the correct tab:
    showTab(currentTab);
}

function validateForm() {
    var k, y, i, valid = true;

    k = document.getElementsByClassName("tab");
    y = k[currentTab].getElementsByTagName("input");

    // This function deals with validation of the form fields
    for (i = 0; i < y.length; i++) {

        // If a field is empty...
        if (y[i].value == "") {

            // add an "invalid" class to the field:
            y[i].className += " invalid";

            // and set the current valid status to false
            valid = false;
        }
    }

    // If the valid status is true, mark the step as finished and valid:
    if (valid) {
        $(".step").eq(currentTab).addClass("finish");
    }
    return valid; // return the valid status
}

function fixStepIndicator(n) {
    // This function removes the "active" class of all steps...
    var i, x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
    }
    //... and adds the "active" class on the current step:
    x[n].className += " active";
}
