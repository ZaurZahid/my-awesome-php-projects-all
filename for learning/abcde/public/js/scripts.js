$(document).ready(function() {
    $(window).scroll(function() { var top = $('#return-to-top'); if ($(this).scrollTop() >= 50) { top.fadeIn(200); } else { top.fadeOut(200); } });
    var top1 = $('#return-to-top');
    top1.click(function() { $('body,html').animate({ scrollTop: 0 }, 500); });

    function hideLoader() { $('.loader').hide(); }
    setTimeout(hideLoader, 1 * 1000);
    if ($(window).width() >= 768) {
        $(window).scroll(function() {
            var bitmap = $('#x1 .bitmap'),
                bitmap_2 = $('#x2 .bitmap_2'),
                bitmap_3 = $('#x3 .bitmap_3');
            if ($(this).scrollTop() >= 200) { bitmap.addClass("d-block animated_2 fadeInLeft"); } else { bitmap.fadeOut(100); }
            if ($(this).scrollTop() >= 700) { bitmap_2.addClass("d-block animated_2 fadeInRight"); } else { bitmap_2.fadeOut(100); }
            if ($(this).scrollTop() >= 1000) { bitmap_3.addClass("d-block animated_2 fadeInRight"); } else { bitmap_3.fadeOut(100); }
        });
        var connectUs = $(".connectUs"),
            phone = $('.fa-phone-volume'),
            callUs = $(".callUs");
        connectUs.hover(function() { phone.addClass("animated tada"); }, function() { phone.removeClass("animated tada"); });
        callUs.hover(function() { phone.addClass("animated tada"); }, function() { phone.removeClass("animated tada"); });
    }
});
(function($) {
    'use strict';
    $(function() {
        var delay_on_start = 3000;
        var $whatsappme = $('.whatsappme');
        var $badge = $whatsappme.find('.whatsappme__badge');
        var wame_settings = $whatsappme.data('settings');
        var store;
        try {
            localStorage.setItem('test', 1);
            localStorage.removeItem('test');
            store = localStorage;
        } catch (e) { store = { _data: {}, setItem: function(id, val) { this._data[id] = String(val); }, getItem: function(id) { return this._data.hasOwnProperty(id) ? this._data[id] : null; } }; }
        if (typeof(wame_settings) == 'undefined') { try { wame_settings = JSON.parse($whatsappme.attr('data-settings')); } catch (error) { wame_settings = undefined; } }
        if ($whatsappme.length && !!wame_settings && !!wame_settings.telephone) { whatsappme_magic(); }

        function whatsappme_magic() {
            var is_mobile = !!navigator.userAgent.match(/Android|iPhone|BlackBerry|IEMobile|Opera Mini/i);
            var has_cta = wame_settings.message_text !== '';
            var message_hash, is_viewed, timeoutID;
            var messages_viewed = (store.getItem('whatsappme_hashes') || '').split(',').filter(Boolean);
            var is_second_visit = store.getItem('whatsappme_visited') == 'yes';
            if (has_cta) {
                message_hash = hash(wame_settings.message_text).toString();
                is_viewed = messages_viewed.indexOf(message_hash) > -1;
            }
            store.setItem('whatsappme_visited', 'yes');
            if (!wame_settings.mobile_only || is_mobile) { setTimeout(function() { $whatsappme.addClass('whatsappme--show'); }, delay_on_start); if (has_cta && !is_viewed) { if (wame_settings.message_badge) { setTimeout(function() { $badge.addClass('whatsappme__badge--in'); }, delay_on_start + wame_settings.message_delay); } else if (is_second_visit) { setTimeout(function() { $whatsappme.addClass('whatsappme--dialog'); }, delay_on_start + wame_settings.message_delay); } } }
            if (has_cta && !is_mobile) { $('.whatsappme__button').mouseenter(function() { timeoutID = setTimeout(show_dialog, 1500); }).mouseleave(function() { clearTimeout(timeoutID); }); }
            $('.whatsappme__button').click(function() {
                var link = whatsapp_link(wame_settings.telephone, wame_settings.message_send);
                if (has_cta && !$whatsappme.hasClass('whatsappme--dialog')) { show_dialog(); } else {
                    $whatsappme.removeClass('whatsappme--dialog');
                    save_message_viewed();
                    send_event(link);
                    window.open(link, 'whatsappme');
                }
            });
            $('.whatsappme__close').click(function() {
                $whatsappme.removeClass('whatsappme--dialog');
                save_message_viewed();
            });

            function show_dialog() {
                $whatsappme.addClass('whatsappme--dialog');
                if (wame_settings.message_badge && $badge.hasClass('whatsappme__badge--in')) {
                    $badge.removeClass('whatsappme__badge--in').addClass('whatsappme__badge--out');
                    save_message_viewed();
                }
            }

            function save_message_viewed() {
                if (has_cta && !is_viewed) {
                    messages_viewed.push(message_hash)
                    store.setItem('whatsappme_hashes', messages_viewed.join(','));
                    is_viewed = true;
                }
            }
        }
    });

    function hash(s) {
        for (var i = 0, h = 1; i < s.length; i++) { h = Math.imul(h + s.charCodeAt(i) | 0, 2654435761); }
        return (h ^ h >>> 17) >>> 0;
    };

    function whatsapp_link(phone, message) {
        var link = 'https://api.whatsapp.com/send?phone=' + phone;
        if (typeof(message) == 'string' && message != '') { link += '&text=' + encodeURIComponent(message); }
        return link;
    }

    function send_event(link) { if (typeof gtag == 'function') { gtag('event', 'click', { 'event_category': 'WhatsAppMe', 'event_label': link, 'transport_type': 'beacon' }); } else if (typeof ga == 'function') { ga('send', 'event', { 'eventCategory': 'WhatsAppMe', 'eventAction': 'click', 'eventLabel': link, 'transport': 'beacon' }); } }
    Math.imul = Math.imul || function(a, b) { var ah = (a >>> 16) & 0xffff; var al = a & 0xffff; var bh = (b >>> 16) & 0xffff; var bl = b & 0xffff; return ((al * bl) + (((ah * bl + al * bh) << 16) >>> 0) | 0); };
}(jQuery));