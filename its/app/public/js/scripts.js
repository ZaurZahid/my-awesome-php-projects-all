/**
 *    Template Functions
 *    URL: @Robocont
 *    Description: Template specific functions and calls
 */

"use strict";

// $( document ).ready( function(){
// // Masonry UL 
// var $container = $('.projects').masonry({ columnWidth:30, gutter: 30});
// });	

/*/*********************************************
 Popup functions
 *********************/

$(window).scroll(function () {
    var windowHeight = $(window).height(),
        bodyHeight = $('header').outerHeight() + $('.content').outerHeight() + $('footer').outerHeight(),
        scroll = $(window).scrollTop();
    if (windowHeight + scroll >= bodyHeight) {
        $('.more').trigger('click');
    }
});

$(document).on('click', '.more', function (e) {
    e.preventDefault();
    var t = $(this),
        box = t.parent().find('.load_content'),
        current = t.siblings('.MarkupPagerNav').find('.MarkupPagerNavOn'),
        next = current.next();
    if (current.hasClass('MarkupPagerNavLastNum')) return false;
    t.hide();
    var url = next.find('a').attr('href');
    current.removeClass('MarkupPagerNavOn');
    next.addClass('MarkupPagerNavOn');
    $.post(url, function (response) {
        box.append($(response).find('.load_content').children());
        if (!next.hasClass('MarkupPagerNavLastNum')) t.show();
    });

    return false;
});

$(document).on('submit', 'form', function (e) {
    var form = $(this),
        formData = new FormData(form[0]);
    $.ajax({
        url: form.attr('action'),
        type: form.attr('method'),
        xhr: function () {
            var myXhr = $.ajaxSettings.xhr();
            if (myXhr.upload) {
                myXhr.upload.addEventListener('progress', progressHandlingFunction, false);
            }
            return myXhr;
        },
        beforeSend: function () {
            form.find('.form_success').remove();
            form.find('.error').removeClass('error');
            form.find('.g-recaptcha > div').css('border', '0');
            $("#recaptcha_reload_btn").click();
        },
        success: function (response) {
            console.log(response)
            try {
                var json = jQuery.parseJSON(response),
                    errors = json.errors,
                    success = json.success;
                if ($(errors).length) {
                    $.each(errors, function (index, value) {
                        if (index == 'recaptcha') {
                            form.find('.g-recaptcha > div').css('border', 'solid 1px red');
                            return;
                        }
                        var input = form.find('*[name=' + index + ']');
                        input.addClass('error');
                    });
					grecaptcha.reset();
                    return;
                }

                if (success) {
                    form.find('input[type=text], textarea').val('');
                   // form.prepend('<i class="form_success">' + success + '</i>');
                   $(".home-contant-form").addClass('success');
					$('.home-contant-form h1').html(success);
                }

            } catch (err) {
                console.log(err);
            }
        },
        error: function (err) {
            console.log(err)
        },
        data: formData,
        cache: false,
        contentType: false,
        processData: false
    });
    e.preventDefault();
    return false;
});

function progressHandlingFunction(e) {
    if (e.lengthComputable) {
        $('progress').attr({value: e.loaded, max: e.total});
    }
}


// Singup function

$(document).on('click', '.signupbtn', function () {
    $('.signup').slideDown();
    $('.signin,.forget').slideUp();
});


// Singin function

$(document).on('click', '.signinbtn', function () {
    $('.signin').slideDown();
    $('.forget,.signup').slideUp();
});


// Forget function

$(document).on('click', '.forgetpassbtn', function () {
    $('.signin,.signup').slideUp();
    $('.forget').slideDown();
});


// Message function

function message(message) {
    $('.ajax-inject .message').fadeIn("slow").delay(500).fadeOut("slow").text(message);
}


// Singup function

$(document).on('click', '.videos .swiper-slide', function () {
    $('.videos .swiper-slide').removeClass('active');
    $(this).addClass('active');
    var iframe = $(this).find('iframe'),
        iframeSrc = iframe.attr('data-src');
    iframe.attr('src', iframeSrc);
});

$(document).on('click', '.video_url', function () {
    var tS = $(this).attr("data-src")
    $(".video_pp").html('<iframe src="' + tS + '" frameborder="0" allowfullscreen></iframe>')
    $(".video_pop_up").fadeIn()
});


$(document).on('click', '.video_closer', function () {
    $(".video_pop_up").fadeOut(function () {
        $(".video_pp").html("")
    })
});


/*/*********************************************
 Ajax popup call function
 *********************/


$('.ajax-link').on('click', function () {
    var ajax_link = '.ajax-link';     							   // Menu Ajax li
    var ajax_inject = '.ajax-inject';							   // Ajax inject div (Pop ups)
    var page = $(this).attr('href');							   // Page link
    $(ajax_inject).addClass('active');
    $("body").addClass('popup');

    $.ajax({
        type: "POST",
        url: page,
        dataType: 'html',
        cache: false,
        success: function (data) {

            $(ajax_inject).html(data);
        }
    });

    return false;

});


/*/*********************************************
 Header & search auto fix position
 *********************/


$(window).on("scroll", function () {
    var page_top = $('.page_top').height() - $('body > .search').height();
    var menuautobg = $(window).height() - 100;
    var scrolltop = $(window).scrollTop();

    if (scrolltop >= page_top) {
        $('body.searchfixed.menu-fix .search .fixing').addClass("active");
    }
    if (scrolltop < page_top) {
        $('body.searchfixed.menu-fix .search .fixing').removeClass('active');
    }

    if (scrolltop >= menuautobg) {
        $('body.menu-auto-bg').addClass("scrolltop");
    }
    if (scrolltop < menuautobg) {
        $('body.menu-auto-bg').removeClass('scrolltop');
    }
});


/*/*********************************************
 Page Slider
 *********************/


$(window).on("load", function () {






        // MAsk
        $("input[name='phone'], input[name='mobile_phone'").mask("+994 00 000-00-00")
        $("input[name='birthday'], input[name='checkin'], input[name='checkout']").mask("00.00.0000")
        // ajax input
        $('.input input , .input textarea').on('keyup', function () {


            if ($(this).attr("form_name") == "fullname" || $(this).attr("name") == "firstname" || $(this).attr("name") == "lastname" || $(this).attr("name") == "patronymic") {
                this.value = this.value.replace(/[^a-zA-ZƏəÜüÖöÇçŞşIıĞğİi \.]/g, '');
            } else if ($(this).attr("name") == "age") {
                this.value = this.value.replace(/[^0-9\.]/g, '');
            } else if ($(this).attr("name") == "number") {
                this.value = this.value.replace(/[^0-9\.]/g, '');
            }


            var di = $(this);

            if (di.val()) {
                $(this).closest("div").addClass('keyup');
            }
            else {

                $(this).closest("div").removeClass('keyup');
            }

        });






    var activeclass = 'active';
    var slid_time = '5000';

    var UlNavLi = '.pageslider .nav li';

    var sliders = {
        SliderClass: '.pageslider',
        activeclass: 'active',
        SlidTime: '5000',
        SlidInterval: '5000',
        current: 1
    };


    for (var x = 1; x <= $(sliders.SliderClass).length; x++) {
        var id = $(sliders.SliderClass).eq(x - 1).attr('id');
        var autoloop = $('#' + id).hasClass('auto-loop');
        var carousel = $('#' + id).hasClass('carousel');


        if ($(window).width() < 768) {
            PageSliderCarousel(id, autoloop);
        }
        else {
            if (carousel == true) {
                PageSliderCarousel(id, autoloop);
            }
            else {
                PageSlider(id, autoloop);
            }
        }


    }


    //Carousel version

    function PageSliderCarousel(id, autoloop) {
        var current = 1;
        var PageSlider = $('#' + id),
            PgsThumbs = $('.slid', PageSlider),
            PgsNav = $('ul.nav', PageSlider),
            SliderContainer = $('.sliders', PageSlider),
            next = $('.next', PageSlider),
            last = $('.last', PageSlider),
            SliderWidth = PageSlider.width(),
            CountSlid = PgsThumbs.length;
        PgsThumbs.width(SliderWidth);
        SliderContainer.width(SliderWidth * CountSlid);

        $(window).on("resize", function () {
            SliderWidth = PageSlider.width();
            PgsThumbs.width(SliderWidth);
            SliderContainer.width(SliderWidth * CountSlid);
            current = 0;
            Pgs();
        });

        // Adding navigation li

        PageSlider.append("<ul class='nav'></ul>");
        var Pgs_list = '';
        PgsThumbs.eq(1).addClass(sliders.activeclass);
        for (var i = 1; i <= CountSlid; i++) {
            var textli = PgsThumbs.eq(i - 1).html();
            $('ul.nav', PageSlider).append("<li>" + textli + "</li>");
        }

        var PgsList = $('.nav li', PageSlider);
        PgsList.eq(0).addClass(sliders.activeclass);

        // Click sider nav

        PgsList.on("click", function () {
            var currentLi = $(this).index();
            PgsThumbs.removeClass(sliders.activeclass);
            PgsList.removeClass(sliders.activeclass);
            PgsThumbs.eq(currentLi).addClass(sliders.activeclass);
            PgsList.eq(currentLi).addClass(sliders.activeclass);
            SliderContainer.animate({'left': '-' + SliderWidth * currentLi}, sliders.SlidTime, 'swing');
            current = currentLi++;

        });

        // Auto loop

        function PgsInit() {
            // if (PgsThumbs.length > 0) {
            //var PgsInterval =
            setInterval(Pgs, sliders.SlidInterval);

            // }
        }

        // Slide function

        function Pgs() {
            if (current < PgsThumbs.length) {
                PgsThumbs.removeClass(sliders.activeclass);
                PgsList.removeClass(sliders.activeclass);
                PgsThumbs.eq(current).addClass(sliders.activeclass);
                PgsList.eq(current).addClass(sliders.activeclass);
                SliderContainer.animate({'left': '-' + SliderWidth * current}, sliders.SlidTime, 'swing');
                current++;
            }
            else {
                current = 1;
                PgsThumbs.removeClass(sliders.activeclass);
                PgsList.removeClass(sliders.activeclass);
                PgsThumbs.eq(0).addClass(sliders.activeclass);
                PgsList.eq(0).addClass(sliders.activeclass);
                SliderContainer.animate({'left': '0'}, sliders.SlidTime, 'swing');
            }


        }

        // Next slid

        next.on("click", function () {
            PgsThumbs.removeClass(sliders.activeclass);
            PgsList.removeClass(sliders.activeclass);
            PgsThumbs.eq(current).addClass(sliders.activeclass);
            PgsList.eq(current).addClass(sliders.activeclass);
            Pgs();
        });

        // Last Slid

        last.on("click", function () {
            current = sliders.current - 2;
            if (current < 0) {
                current = 0;
            }
            PgsThumbs.removeClass(sliders.activeclass);
            PgsList.removeClass(sliders.activeclass);
            PgsThumbs.eq(current).addClass(sliders.activeclass);
            PgsList.eq(current).addClass(sliders.activeclass);
            Pgs();
        });

        if (autoloop == true) {
            setTimeout(PgsInit, 0);
            window.clearTimeout(PgsInit);
        }
    }


    //Default version

    function PageSlider() {
        var current = 1;

        var PageSlider = $('#' + id),
            PgsThumbs = $('.slid', PageSlider),
            PgsNav = $('ul.nav', PageSlider),
            SliderContainer = $('.sliders', PageSlider),
            next = $('.next', PageSlider),
            last = $('.last', PageSlider),
            CountSlid = PgsThumbs.length;

        // Adding navigation li*

        PageSlider.append("<ul class='nav'></ul>");
        var Pgs_list = '';
        PgsThumbs.eq(0).addClass(sliders.activeclass);
        for (var i = 1; i <= CountSlid; i++) {
            $('ul.nav', PageSlider).append("<li></li>");
        }
        var PgsList = $('.nav li', PageSlider);
        PgsList.eq(0).addClass(sliders.activeclass);

        // Click sider nav

        PgsList.on("click", function () {
            var currentLi = $(this).index();
            PgsThumbs.removeClass(sliders.activeclass);
            PgsList.removeClass(sliders.activeclass);
            PgsThumbs.eq(currentLi).addClass(sliders.activeclass);
            PgsList.eq(currentLi).addClass(sliders.activeclass);
            current = currentLi++;

        });

        // Auto loop

        function PgsInit() {
            if (PgsThumbs.length > 1) {
                setInterval(Pgs, slid_time);
            }
        }

        // Slide function

        function Pgs() {
            if (current < PgsThumbs.length) {
                PgsThumbs.removeClass(sliders.activeclass);
                PgsList.removeClass(sliders.activeclass);
                PgsThumbs.eq(current).addClass(sliders.activeclass);
                PgsList.eq(current).addClass(sliders.activeclass);
                current++;
            }
            else {
                current = 0;
            }

        }

        // Next slid

        next.on("click", function () {
            current = current++;
            PgsThumbs.removeClass(sliders.activeclass);
            PgsList.removeClass(sliders.activeclass);
            PgsThumbs.eq(current).addClass(sliders.activeclass);
            PgsList.eq(current).addClass(sliders.activeclass);
            Pgs();
        });

        // Last Slid

        last.on("click", function () {
            current = current - 2;
            if (current < 0) {
                current = 0;
            }
            PgsThumbs.removeClass(sliders.activeclass);
            PgsList.removeClass(sliders.activeclass);
            PgsThumbs.eq(current).addClass(sliders.activeclass);
            PgsList.eq(current).addClass(sliders.activeclass);
            Pgs();
        });
        if (autoloop == true) {
            setTimeout(PgsInit, 0);
            window.clearTimeout(PgsInit);
        }

    }
});


	
	
	
	
	
	
	
