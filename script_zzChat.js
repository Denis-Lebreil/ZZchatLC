/* global variables used for the language management */
var language_menu_open = false;
var language_list;

/* global flag that shows if the form can be submitted (empty, invalid..) */
var submissible = false;

/* retrieves the different languages available and makes a list of it */
function getLanguages() {

    $.get("readLanguages.php",
        function (data) {
            language_list = data.split(" ");
        }
    );
}




getLanguages();

$(document).ready(
    function () {
        /* displays the language menu */
        $("#language_selector").click(
            function () {
                if (!language_menu_open) /* opening the menu */ {
                    var url = window.location.pathname;
                    var languages = '';

                    var language_number = language_list.length;
                    /* creates and displays the right links for the different versions of the page */
                    for (var i = 0; i < language_number; i++) {
                        languages = languages +
                            ' <a href="' + url + '?lang=' + language_list[i] + '"><span id="language_item">' + language_list[i] + '</span></a>';
                    }

                    $("#language_item").html(languages);

                    language_menu_open = true;
                } else /* closing the menu */ {
                    $("#language_item").text("");
                    language_menu_open = false;
                }
            }
        );
    }
);


/* blocks the connection if the form isn't submissible */
function connect() {
    if (connect.count == undefined)
        connect.count = 1;
    else
        connect.count++;

    /* a little animation of the error "message" : it grows up at each try */
    $("#error").css("text-color", "red").animate({
        fontSize: '+=' + 3 * connect.count + 'px'
    }, "fast").animate({
        fontSize: '-=' + 3 * connect.count + 'px'
    }, "fast").css("text-color", "black");
    return submissible;

}

/* tests if the nickname is good : not empty, without special characters and not already in use */
function validate() {
    var user = $("#user").val();
    var user0 = user;
    /* the clean version of the nickname to compare it with the actual one */
    user = user.replace(/[^a-z0-9\s]/gi, '');
    
    submissible = false;

    if (user0 !== user) /* if there are special characters */ {
        $("#error").html("(" + user + ")");

    } else if (user == '') /* if the field is empty */ {
        $("#error").html("?");
    } else /* the field looks ok ... **/ {
        /* we test if somebody online has the same nickname */
        $.post("validate_user.php", {
                user: user
            },
            function (data) {
                if (data[0] == 'C') /* "_C_onnected */ {
                    $("#error").html(":)");
                    submissible = true;
                } else if (data[0] == 'U') /* "_U_ser already connected" */ {
                    $("#error").html("!");
                    submissible = false;
                } else /* something's wrong with the answer */ {
                    $("#error").html("!");
                    submissible = false;
                }
            }
        );

    }
}