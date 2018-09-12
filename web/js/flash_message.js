/**
 * Сообщения флеш
 */
$("#mess_message_close").on('click', function () {
    $("#mess_msg-cntain").hide();
});

$("#message_message_close_error").on('click', function () {
    $("#message_msg-cntain-error").hide();
});

$('.modal_button').click(function (){

    if ($(".error-modal").find('*').length == 0) {
        if(!$('div').is("#appen")){
            $(".close").after('<div id="appen"></div>');
        }
        $('#site_uid25').hide();
    }
});