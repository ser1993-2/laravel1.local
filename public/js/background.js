$( document ).ready(function() {

    function send(color) {
        $.ajax({
            type: "post",
            url: "background",
            data: "color="+color,
            success: function(){
                alert( "Фон изменен ");
            }
        });
    }

    $('#Check').on('click', function () {
        if ($('#Check').is(':checked')) {
            send('green');
            $('body').css("backgroundColor", "green");
        } else {
            send('white');
            $('body').css("backgroundColor", "white");
        }
    });

    if ($('#Check').is(':checked')) {
        $('body').css("backgroundColor", "green");
    } else {
        $('body').css("backgroundColor", "white");
    };
});