$(function() {

    tinymce.init({
        selector: 'textarea.editor',
        height: 300,
        plugins: [
            "advlist autolink link image lists charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
            "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
        ],
        toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
        image_advtab: true,
        filemanager_title: "Dosya yoneticisi",
        external_filemanager_path: app_url + "/3rd-party-apps/filemanager/",
        external_plugins: { "filemanager": app_url + "/3rd-party-apps/filemanager/plugin.min.js" },
        filemanager_access_key: "zaur1234"
            /* ,
                    language_url: 'admin/public/scripts/tr_TR.js' */
            //dilini de deyise bilersen

    });
    tinymce.init({
        selector: 'textarea.short-editor',
        height: 200,
        plugins: [
            "advlist autolink link image lists charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
            "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
        ],
        toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
        image_advtab: true,
        filemanager_title: "Dosya yoneticisi",
        external_filemanager_path: app_url + "/3rd-party-apps/filemanager/",
        external_plugins: { "filemanager": app_url + "/3rd-party-apps/filemanager/plugin.min.js" },
        filemanager_access_key: "zaur1234"
            /* ,
                    language_url: 'admin/public/scripts/tr_TR.js' */
            //dilini de deyise bilersen

    });
    $('[tab]').each(function() {
        var tabList = $('[tab-list] li', this),
            tabContent = $('[tab-content]', this);
        tabList.filter(':first').addClass('active');
        tabContent.filter(':not(:first)').hide()

        tabList.on('click', function(e) {
            var index = $(this).index();
            tabList.removeClass('active').filter(this).addClass('active');
            tabContent.hide().filter(':eq(' + index + ')').fadeIn(1200);

            e.preventDefault();
        });
    });
    //sortable islemi
    $(".menu").sortable({
        'handle': '.handle',
        update: function(event, ui) {
            $('#menu>li').each(function() {
                var subMenu = $('li', this);
                if (subMenu.length) {
                    var index = $(this).index();
                    subMenu.each(function() {
                        $('input:eq(0)', this /* subMenu yəni */ ).attr('name', 'sub_title_' + index + '[]')
                        $('input:eq(1)', this /* subMenu yəni */ ).attr('name', 'sub_url_' + index + '[]')
                    })
                }
            });
        }
    });

    $('.table-sortable').sortable({
        update: function(event, ui) {
            var postData = $(this).sortable('serialize');
            postData += '&table=' + $(this).data('table');
            postData += '&column=' + $(this).data('column');
            postData += '&where=' + $(this).data('where');
            $.post(api_url + '/table-sort', postData, function(response) {
                if (response.success) {
                    $('.success-msg').show().find('div').html(response.success);
                }
            }, 'json');
        }
    });
    $(document.body).on('click', '.success-close-btn', function(e) {

        $(this).parent().hide();
        e.preventDefault();
    })
})