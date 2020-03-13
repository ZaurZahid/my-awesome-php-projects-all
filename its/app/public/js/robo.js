/**
 *	Robo Framework 1.2
 *	URL: @http://roboframework.com
 *	Description: Commercial licence version
 */

$(document).ready(function() {
    "use strict";
    /*
     *	Framework Functions Options
     */

    // Links Smoot scroll
    var menu_linkscroll = '.page-link';

    // Sign in/up form & links
    var ajaxdiv = '.ajax-inject';

    // Retina imgs elements
    var retina_img = ''; // element or class name

    // Counter number
    var count_number_elemet = '.timer';

    // Compact menu icon
    var compact_menu_icon = '.compact-menu-icon';

    // Google map settings
    var mapdivid = 'map';
    var markericon = 'img/mapmarker.png';
    var mapzoom = 15;
    var mapzoomcontrol = false;
    var item_result = 'ul.item-result li';

    var Robo = {
        init: function() {
            Robo.link_page();
            Robo.accordion();
            Robo.tabs();
            Robo.chechkbox();
            Robo.radio();
            Robo.dropdown();
            Robo.Switch();
            Robo.players();
            Robo.loading();
            Robo.compactmenu();
            Robo.escape();
            Robo.retina();
            Robo.maps();
            Robo.parallax();
            Robo.count();
        },


        link_page: function() {

            // Scroll TO

            $(menu_linkscroll).on("click", function() {
                var parent = $(this).attr("href");
                $('html,body').animate({ scrollTop: $(parent).offset().top }, 'swing');
                return false;
            });
        },

        compactmenu: function() {

            // Compact navigation

            $(compact_menu_icon).on("click", function() {
                $('body').toggleClass("menu-active");
            });

            // Responsive navigation
            var menu_responsive = $('.menu.responsive');
            if ($(window).width() < 1200) {
                menu_responsive.addClass('compact');
                $('.menu li.sub > a').click(function() { return false });

            }
            $(window).on("resize", function() {
                if ($(window).width() < 1200) {
                    menu_responsive.addClass('compact');
                    $('.menu li.sub > a').click(function() { return false });
                } else {
                    menu_responsive.removeClass('compact');
                    $('.menu li.sub > a').click(function() { location.replace($(this).attr('href')); });
                }
            });

        },


        accordion: function() {

            // Accordion

            $(".accordion li > a").on("click", function() {
                var accordionli = $(this).parent("li").hasClass("active");
                if (accordionli == true) {
                    $(this).parent().parent().find("div.content").slideUp();
                    $(this).parent("li").removeClass('active');
                } else {
                    $(this).parent().parent().find("div.content").slideUp();
                    $(this).parent().find("div.content").slideDown();
                    $(this).parent().parent().find("li").removeClass('active');
                    $(this).parent("li").addClass('active');
                }
                return false;
            });
        },

        tabs: function() {

            // Tabs

            $(".tabs ul li").on("click", function() {
                var taburl = $("a", this).attr("href");
                $(this).parent().parent().find("div").removeClass('active');
                $(this).parent().parent().find(taburl).addClass('active');
                $(this).parent().find("li").removeClass('active');
                $(this).addClass('active');
                return false;
            });
        },


        chechkbox: function() {

            // Chechkbox

            var checkbox = {
                label: $('label.checkbox'),
                checked: $('label.checkbox input:checked'),
                disabled: $('label.checkbox input:disabled')
            };

            // checking prosess


            checkbox.checked.parent().addClass('checked');
            checkbox.disabled.parent().addClass('disabled');

            // Click		



            checkbox.label.on("click", function() {
                if ($(this).hasClass('disabled')) {} else if ($(this).hasClass('checked')) {
                    $(this).removeClass('checked');
                    $('input:checkbox', this).prop('checked', false);
                } else {
                    $(this).addClass('checked');
                    $('input:checkbox', this).prop('checked', true);
                }
                return false;
            });


        },



        radio: function() {

            // Radio buttons

            var radiobutton = {
                label: $('label.radio'),
                checked: $('label.radio input:checked'),
                disabled: $('label.radio input:disabled')
            };

            // checking prosess

            radiobutton.checked.parent().addClass('checked');
            radiobutton.disabled.parent().addClass('disabled');

            // Click		

            radiobutton.label.on("click", function() {
                if (!$(this).hasClass('disabled') && !$(this).hasClass('checked')) {

                    var thisgroup = $('input:radio', this).attr('name');
                    $('input[name=' + thisgroup + ']').parent().removeClass('checked');

                    $(this).addClass('checked');
                    $('input:radio', this).prop('checked', true);
                }
                return false;
            });


        },



        dropdown: function() {



            var eachdown = $('select.dropdown');
            eachdown.each(function(i) {


                var drowdown = {
                    drowdown_id: 'dropdown-' + $(this).attr('name'),
                    options: $('option', this).length,
                    option: $('option', this),
                    selected: $('option:selected', this).html(),
                    selected_option_index: $('option:selected', this).index()

                };


                $(this).after('<div class="dropdown" id="' + drowdown.drowdown_id + '"><span>' + drowdown.selected + '</span></div>');
                $('#' + drowdown.drowdown_id).attr('class', $(this).attr('class'));

                $('#' + drowdown.drowdown_id).append("<ul></ul>");

                var Pgs_list = '';

                for (var i = 1; i <= drowdown.options; i++) {
                    $('#' + drowdown.drowdown_id + ' ul').append("<li>" + drowdown.option.eq(i - 1).html() + "</li>");
                }


                var option_list = $('#' + drowdown.drowdown_id + ' ul li');
                option_list.eq(drowdown.selected_option_index).addClass('active');

                option_list.on("click", function() {
                    option_list.removeClass('active');
                    var selected_li = $(this).index();
                    var selected_option = drowdown.option.eq(selected_li);

                    $(this).addClass('active');

                    $('#' + drowdown.drowdown_id + ' span').html(selected_option.html());

                    drowdown.option.prop('selected', false);
                    selected_option.prop('selected', true);

                    if (drowdown.drowdown_id == "dropdown-select_lang") {
                        //console.log(selected_option.val());
                        window.location = selected_option.val();
                    }

                });
            });




            $('div.dropdown').on("click", function() {
                $(this).toggleClass("active");
                return false;
            });
            $(window).on("click", function() {
                $('.dropdown.active').removeClass("active");
            });

        },



        Switch: function() {

            // Chechkbox

            var Switch = {
                label: $('label.switch'),
                checked: $('label.switch input:checked'),
                disabled: $('label.switch input:disabled')
            };

            // checking prosess


            Switch.checked.parent().addClass('checked');
            Switch.disabled.parent().addClass('disabled');

            // Click		



            Switch.label.on("click", function() {
                if ($(this).hasClass('disabled')) { return false; } else if ($(this).hasClass('checked')) {
                    $(this).removeClass('checked');
                    $('input:checkbox', this).prop('checked', false);
                } else {
                    $(this).addClass('checked');
                    $('input:checkbox', this).prop('checked', true);
                }
                return false;
            });


        },




        loading: function() {

            // Loading animation show


            $(window).on("load", function() {
                $(".loading").removeClass('loading');
            });
            $(document).on({
                ajaxStart: function() { $(ajaxdiv).addClass("loading"); },
                ajaxStop: function() { $(ajaxdiv).removeClass("loading"); }
            });

        },

        escape: function() {

            // escape key & Close button

            $(document).on("keyup", function(e) {
                if (e.keyCode == 27) {
                    $(ajaxdiv).removeClass('active');
                    $('body').removeClass('menu-active popup');
                    $(ajaxdiv).html(' ');
                }
            });

            // close icon

            $(document).on("click", ".close", function() {
                $(ajaxdiv).removeClass('active');
                $('body').removeClass('menu-active popup');
                $(ajaxdiv).html(' ');

            });


        },

        retina: function() {

            // Retina Display images

            if (window.devicePixelRatio > 1) {
                var lowresImages = $(retina_img);
                lowresImages.each(function(i) {
                    var retinasrc = $(this).attr('src');
                    var retina_str = retinasrc,
                        replacement = '@2x.';
                    retinasrc = retina_str.replace(/.([^.]*)$/, replacement + '$1');
                    $(this).attr('src', retinasrc);
                });
            }

        },

        count: function() {


            $.fn.countTo = function(options) {


                options = $.extend({}, $.fn.countTo.defaults, options || {});

                return $(this).each(function() {
                    var _this = this,
                        loopCount = 0,
                        value = options.from,
                        interval = setInterval(updateTimer, options.refreshInterval);




                    var settings = $.extend({}, $.fn.countTo.defaults, {
                        from: $(this).data('from'),
                        to: $(this).data('to'),
                        speed: $(this).data('speed'),
                        refreshInterval: 100,
                        decimals: 0
                    }, options);

                    var loops = Math.ceil(settings.speed / settings.refreshInterval),
                        increment = (settings.to - settings.from) / loops;

                    var self = this,
                        $self = $(this),
                        loopCount = 0,
                        value = settings.from,
                        data = $self.data('countTo') || {};


                    function updateTimer() {
                        value += increment;
                        loopCount++;
                        $(_this).html(value.toFixed(options.decimals));

                        if (typeof(options.onUpdate) == 'function') {
                            options.onUpdate.call(_this, value);
                        }

                        if (loopCount >= loops) {
                            clearInterval(interval);
                            value = options.to;

                            if (typeof(options.onComplete) == 'function') {
                                options.onComplete.call(_this, value);
                            }
                        }
                    }
                });
            };

            $.fn.countTo.defaults = {
                from: $(this).data('from'), // data from
                to: $(this).data('to'), // data TO
                speed: 1000, // animation Speed
                refreshInterval: 100, // element should be updated
                decimals: 0, // decimal places to show
                onUpdate: null, // every time the element is updated,
                onComplete: null, // for when the element finishes updating
            };

            $(window).on("load", function() { $(count_number_elemet).countTo(); });


        },




        parallax: function() {

            // Parallax effect

            $(window).on("scroll", function() {

                var res = {
                    scroll: $(window).scrollTop(), // Window height
                    height: $('.parallax').height() // Div height
                };
                var translate = res.scroll / 4;
                var opacityheight = (res.scroll * 100 / res.height) / 100;
                var result_opacity = 1 - opacityheight * 2;

                $('.landing-slider .slid-text').css({
                    'opacity': result_opacity
                });

                if (res.scroll > 0) {

                    $('.parallax img , .parallax .video ').css({
                        '-webkit-transform': 'translate(0, -' + translate + 'px)',
                        '-moz-transform': 'translate(0, ' + translate + 'px)',
                        '-ms-transform': 'translate(0, ' + translate + 'px)',
                        '-o-transform': 'translate(0, ' + translate + 'px)',
                        'transform': 'translate(0, -' + translate + 'px)'
                            //  'opacity'           : result_opacity
                    });

                }
            });



        },


        maps: function() {

            // Map settings

            var map,
                data_lat_map = $("#" + mapdivid).attr('data-lat'),
                data_lng_map = $("#" + mapdivid).attr('data-lng'),
                data_marker = $("#" + mapdivid).attr('data-marker'),
                data_style = $("#" + mapdivid).attr('data-style'),
                mapstyle = [{ "featureType": "water", "elementType": "geometry", "stylers": [{ "color": "#e9e9e9" }, { "lightness": 17 }] }, { "featureType": "landscape", "elementType": "geometry", "stylers": [{ "color": "#f5f5f5" }, { "lightness": 20 }] }, { "featureType": "road.highway", "elementType": "geometry.fill", "stylers": [{ "color": "#ffffff" }, { "lightness": 17 }] }, { "featureType": "road.highway", "elementType": "geometry.stroke", "stylers": [{ "color": "#ffffff" }, { "lightness": 29 }, { "weight": 0.2 }] }, { "featureType": "road.arterial", "elementType": "geometry", "stylers": [{ "color": "#ffffff" }, { "lightness": 18 }] }, { "featureType": "road.local", "elementType": "geometry", "stylers": [{ "color": "#ffffff" }, { "lightness": 16 }] }, { "featureType": "poi", "elementType": "geometry", "stylers": [{ "color": "#f5f5f5" }, { "lightness": 21 }] }, { "featureType": "poi.park", "elementType": "geometry", "stylers": [{ "color": "#dedede" }, { "lightness": 21 }] }, { "elementType": "labels.text.stroke", "stylers": [{ "visibility": "on" }, { "color": "#ffffff" }, { "lightness": 16 }] }, { "elementType": "labels.text.fill", "stylers": [{ "saturation": 36 }, { "color": "#333333" }, { "lightness": 40 }] }, { "elementType": "labels.icon", "stylers": [{ "visibility": "off" }] }, { "featureType": "transit", "elementType": "geometry", "stylers": [{ "color": "#f2f2f2" }, { "lightness": 19 }] }, { "featureType": "administrative", "elementType": "geometry.fill", "stylers": [{ "color": "#fefefe" }, { "lightness": 20 }] }, { "featureType": "administrative", "elementType": "geometry.stroke", "stylers": [{ "color": "#fefefe" }, { "lightness": 17 }, { "weight": 1.2 }] }];
            //mapstyle_light = [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}];	

            // if(data_style){
            // 	mapstyle = mapstyle_light;
            // }

            if (data_lat_map) {
                google.maps.event.addDomListener(window, 'load', init);
            }

            function init() {

                var mapOptions = {
                    center: new google.maps.LatLng(data_lat_map, data_lng_map),
                    zoom: mapzoom,
                    zoomControl: mapzoomcontrol,
                    disableDoubleClickZoom: true,
                    mapTypeControl: false,
                    scaleControl: true,
                    scrollwheel: false,
                    panControl: false,
                    streetViewControl: false,
                    draggable: true,
                    overviewMapControl: false,
                    overviewMapControlOptions: { opened: false, },
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    styles: mapstyle,
                }



                var mapElement = document.getElementById(mapdivid);
                var map = new google.maps.Map(mapElement, mapOptions);
                var locations = [];




                if (data_marker && data_lat_map) {

                    var beachMarker = new google.maps.Marker({
                        position: new google.maps.LatLng(data_lat_map, data_lng_map),
                        map: map,
                        icon: markericon
                    });
                    beachMarker.setMap(map);
                }
            }
        },


        /*maps: function(){
        	
        	
        	
        	
        		$(document).ready(function(e) {

        		var osmUrl = 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
        		osmAttrib = '&copy; Robo Framework',
        		osm = L.tileLayer(osmUrl, {maxZoom: 18, attribution: osmAttrib});

        		


        			var markers = new L.FeatureGroup();
        			var itemcountli = $(item_result).length;
        			
        			
        			

        			
        			
        			// default marker eger lazimdursa
        			
        			var data_lat_map = $("#map").attr('data-lat');
        			var data_lng_map = $("#map").attr('data-lng');
        			var data_marker = $("#map").attr('data-marker');
        			
        			
        			if(data_marker)
        			{
        				
        				var map = L.map('map')
        				.setView([data_lat_map,data_lng_map], 14)
        				.addLayer(osm);

        				var markerStatic = new L.Marker([data_lat_map, data_lng_map], {
        				draggable: false,
        				title: 'Static'
        					});
        				map.addLayer(markerStatic);
        			
        			}
        			else
        			{
        				var map = L.map('map')
        				.setView([data_lat_map,data_lng_map], 14)
        				.addLayer(osm);
        			}
        			
        			
        			for(var i = 1; i <= itemcountli; i++){

        				var data_lat = $(item_result).eq(i-1).attr('data-lat');
        				var data_lng = $(item_result).eq(i-1).attr('data-lng');
        				var description = $(item_result).eq(i-1).html();
        				
        				var markerStatic = new L.Marker([data_lat, data_lng], {
        				draggable: false,
        				title: 'Static'
        				});
        				
        				map.addLayer(markerStatic);
        				markerStatic.bindPopup(description) ;
        			}
        			

        			function logEvent(e) { console.log(e.type); }
        		  
        		});
        		
        		
        },		
        	*/


        players: function() {

            // Video player	

            $(".video .stop").on("click", function() {
                var videoplayer = $(this).parent().parent().find("video")[0];
                var videodiv = $(this).parent().parent(".video");
                videoplayer.pause();
                videodiv.removeClass('active');
                videoplayer.currentTime = 0;
                return false;
            });
            $(".video .pause").on("click", function() {
                var videoplayer = $(this).parent().parent().find("video")[0];
                var videodiv = $(this).parent().parent(".video");
                videoplayer.pause();
                videodiv.removeClass('active');
                return false;
            });
            $("video").on("click", function() {
                var videoplayer = $(this)[0];
                var videodiv = $(this).parent(".video");
                if (videoplayer.paused) {
                    videoplayer.play();
                    videodiv.addClass('active');
                } else {
                    videoplayer.pause();
                    videodiv.removeClass('active');
                }

            });
            $(".video .play").on("click", function() {
                var videoplayer = $(this).parent().find("video")[0];
                var videodiv = $(this).parent(".video");
                if (videoplayer.paused) {
                    videoplayer.play();
                    videodiv.addClass('active');
                } else {
                    videoplayer.pause();
                    videodiv.removeClass('active');
                }

            });


            // Audio player

            $(".audio .play").on("click", function() {
                var audioplayer = $(this).parent().find("audio")[0];
                var audiodiv = $(this).parent(".audio");

                if (audioplayer.paused) {
                    audioplayer.play();
                    audiodiv.addClass('active');
                } else {
                    audioplayer.pause();
                    audiodiv.removeClass('active');
                }
            });

            $(".audio .stop").on("click", function() {
                var audioplayer = $(this).parent().find("audio")[0];
                var audiodiv = $(this).parent(".audio");
                audiodiv.removeClass('active');
                audioplayer.pause();
                audioplayer.currentTime = 0;
            });
        }






    };

    Robo.init();

});