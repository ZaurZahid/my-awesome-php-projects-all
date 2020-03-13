$(function() {
    $('#gonder-btn').on('click', function(e) {
        var formData = $('#iletisim-form').serialize();
        $.post('ajax.php', formData + "&tip=iletisim", function(response) {
            if (response.hata) {
                $('#basarili').hide();
                $('#basarisiz').html(response.hata).show();
                $("#" + response.target).focus();
            } else {
                $('#basarisiz').hide();
                $('#basarili').html(response.deyer).show();
            }
        }, 'json');


        e.preventDefault();
    })


})