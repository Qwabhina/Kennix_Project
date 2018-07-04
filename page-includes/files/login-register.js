$(function () {
    $('select').formSelect();
});

var $loginForm = $("form#login-form");
var $registerForm = $("form#register-form");

//Login
$("button[name=btn_login]").click(function (e) {
    e.preventDefault();

    if ($("input#username").val() != "" || $("input#password").val() != "") {
        log_user_in();
    }
});
//Registration
$("button[name=btn_register]").click(function (e) {
    e.preventDefault();
    register_user();
});




//Dismiss Error Message
function dismissParent() {
    $("div.error").slideUp(350);
}

//Show Progress Bar
function progressBar() {
    $("div.progress").fadeToggle(0);
}

//Login Form Submission
function log_user_in() {
    var data = $loginForm.serialize();

    $.ajax({
        type: "POST",
        url: '/members/processLogin.php',
        dataType: "json",
        data: data + "&btn_login",
        beforeSend: function () {
            $("button[type=submit]").prop("disabled", true);
            dismissParent();
            progressBar();
        },
        success: function (response) {
            progressBar();

            if (response.type === "success") {
                window.location.replace("/members/dashboard");
            } else {
                $("button[type=submit]").prop("disabled", false);

                $("div.error").html("<p>" + response.content + '</p><button type="button" onclick="dismissParent()" class="btn center white red-text text-darken-2">Dismiss</button>').slideDown(250);
            }
        },
        error: function (jXHR, textStatus, errorThrown) {
            progressBar();
            $("button[type=submit]").prop("disabled", false);

            $("div.error").html("<p>" + errorThrown + '</p><button type="button" onclick="dismissParent()" class="btn center white red-text text-darken-2">Dismiss</button>').slideDown(250);

            //console.log("("+textStatus+") "+errorThrown);
        }
    });
}


//Registration Form Submission
function register_user() {
    var data = $registerForm.serialize();

    $.ajax({
        type: "POST",
        url: '/members/processRegistration.php',
        dataType: "json",
        data: data + "&btn_register",
        beforeSend: function () {
            $("button[type=submit]").prop("disabled", true);
            dismissParent();
            progressBar();
        },
        success: function (response) {
            progressBar();

            if (response.type === "success") {
                window.location.replace("/members/register-success.html");
            } else {
                $("button[type=submit]").prop("disabled", false);

                $("div.error").html("<p>" + response.content + '</p><button type="button" onclick="dismissParent()" class="btn center white red-text text-darken-2">Dismiss</button>').slideDown(250);
            }
        },
        error: function (jXHR, textStatus, errorThrown) {
            progressBar();
            $("button[type=submit]").prop("disabled", false);

            $("div.error").html("<p>" + errorThrown + '</p><button type="button" onclick="dismissParent()" class="btn center white red-text text-darken-2">Dismiss</button>').slideDown(250);

            //console.log("("+textStatus+") "+errorThrown);
        }
    });
}
