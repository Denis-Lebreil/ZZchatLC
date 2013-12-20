/* flag to indicate if the automatic scrolling is activated or not */
var scroll_down = true;


/* Ajax function that gets & displays the people online */
function DisplayPeople() {
    $.get("readPeople.php",
        function (data) {
            /* fetches the list of people and then split it */
            var people = data.split('\n');
            var people_number = people.length;
            data = '';

            /* displays the list of people inside an html list */
            for (var i = 0; i < people_number; i++) {
                data += '<li class="person">' + people[i] + '</li>';
            }
            $("#list_people").html(data);
        }
    );
}

/* Ajax function that gets & display the messages */
function DisplayMessages() {
    $.get("readMessages.php",
        function (data) {
            /* fetches the list of messages and splits it by lines */
            var lines = data.split('<br/>');
            var lines_number = lines.length;
            data = '';

            /* displays the messages inside an html list */
            for (var i = 0; i < lines_number - 1; i++) {
                data += '<li class="public_line">' + lines[i] + '</li>';
            }
            $("#chat_text").html(data);
        }
    );
    if (scroll_down) {
        /* automatic positionning of the scrollbar */
        $("#chat_window").scrollTop($("#chat_window")[0].scrollHeight);
    }

}



$(document).ready(
    function () {

        var user = $("#user").text();

        /* we set a time interval for refreshment of the lists of messages and people online (one second)*/
        setInterval("DisplayMessages()", 1000);
        setInterval("DisplayPeople()", 1000);

        /* sending a message */
        $('#send_message').on('submit', function () {
            /* we get the content of the text to be sent */
            var wMessage = $('#wMessage').val();

            /* we don't do anything if the message is empty */
            if (wMessage != '') {
                /* Ajax call; after it, we immediately refresh the messages display to show the new message */
                $.post("writeMessage.php", {
                    wPerson: user,
                    wMessage: wMessage
                }, DisplayMessages());
                $("#wMessage").val('');

            }
            return false;
        });

        /* disconnecting via the button */
        $("#disconnect").on("submit",
            function () {
                $.post("disconnect.php", {
                    dPerson: user
                });

            }
        );

        /* disconnecting without the button - trying at least */
        $(window).on('unload', function () {
            $.post("disconnect.php", {
                dPerson: user
            });
        });

        /* all the formatting buttons; they insert the right bbcode around the message */
        $("#bold_button").click(function () {
            var t = $("#wMessage");
            t.val('[b]' + t.val() + '[/b]');
        });
        $("#italic_button").click(function () {
            var t = $("#wMessage");
            t.val('[i]' + t.val() + '[/i]');
        });
        $("#underlined_button").click(function () {
            var t = $("#wMessage");
            t.val('[u]' + t.val() + '[/u]');
        });
        $("#red_button").click(function () {
            var t = $("#wMessage");
            t.val('[red]' + t.val() + '[/red]');
        });
        $("#green_button").click(function () {
            var t = $("#wMessage");
            t.val('[green]' + t.val() + '[/green]');
        });
        $("#blue_button").click(function () {
            var t = $("#wMessage");
            t.val('[blue]' + t.val() + '[/blue]');
        });
        $("#orange_button").click(function () {
            var t = $("#wMessage");
            t.val('[orange]' + t.val() + '[/orange]');
        });
        $("#indigo_button").click(function () {
            var t = $("#wMessage");
            t.val('[indigo]' + t.val() + '[/indigo]');
        });
        $("#teal_button").click(function () {
            var t = $("#wMessage");
            t.val('[teal]' + t.val() + '[/teal]');
        });

        /* the down and up button that control the automatic-scrolling */
        $("#down_button").hide();
        $("#up_button").click(function () {
            $("#down_button").show();
            $("#up_button").hide();
            scroll_down = false;
        });
        $("#down_button").click(function () {
            $("#up_button").show();
            $("#down_button").hide();
            scroll_down = true;
        });
    }
);