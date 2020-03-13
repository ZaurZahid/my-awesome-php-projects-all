$(function() {
    $("#btn").on('click', function(e) {
        var sonId = $('#list li:last').data('id');
        $.post('ajax.php', { 'id': sonId }, function(response) {
            if (response.gizle) {
                $('#btn').remove();
            }
            $('#list').append(response.html);
        }, 'json')



        e.preventDefault();
    })

});