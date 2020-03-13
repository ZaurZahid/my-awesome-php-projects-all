function send_email(form_id) {
    var data = $(form_id).serialize();

    $.post(api_url + '/send-email', data, function(response) {
        if (response.error) {
            $('#success').hide();
            $('#error').show().html(response.error);
        } else {
            $('#error').hide();
            $('#success').show().html(response.success);
            $(form_id + ' input , ' + form_id + ' textarea ').val(' ');
        }
    }, 'json')
}