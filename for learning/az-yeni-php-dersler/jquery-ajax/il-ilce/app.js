$(function() {
    $(document.body).on('change', '#vilayet', function() {
        var vilayet_kodu = $(this).val();
        if (vilayet_kodu) {
            $.post('ajax.php', { 'vilayet_kodu': vilayet_kodu }, function(response) {
                $('#seher').html(response).removeAttr('disabled');
            })
        } else {
            $('#seher').html('<option>-Seher sec-</option>').attr('disabled', 'disabled');
        }
    })

});