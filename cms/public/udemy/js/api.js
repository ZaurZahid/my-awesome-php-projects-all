function contact(formId) {
    var data = $(formId).serialize();
    $.post(api_url + '/contact', data, function(response) {
        if (response.error) {
            $('#contact-success-msg').hide();
            $('#contact-error-msg').show().html(response.error);
        } else {
            $('#contact-error-msg').hide();
            $('#contact-success-msg').show().html(response.success);
            $(formId + ' input , ' + formId + ' textarea ').val(' ');
        }
    }, 'json')
}


function add_comment(formId) {
    var postId = $(formId).data('id');
    var data = $(formId).serialize() + '&post_id=' + postId;
    $.post(api_url + '/comment', data, function(response) {
        if (response.error) {
            $('#comment-msg').removeClass().addClass("alert alert-danger").html(response.error).show();
        } else if (response.success) {
            $('#comment-msg').removeClass().addClass("alert alert-primary").html(response.success).show();
            $(formId + ' input , ' + formId + ' textarea ').val(' ');
        } else {
            $('#no-comment').remove();
            $('#comment-msg').hide().removeClass().html('');
            $('#comments').append(response.comment);
            $(formId + ' input , ' + formId + ' textarea ').val(' ');
        }

    }, 'json')
}