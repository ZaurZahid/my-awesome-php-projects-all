/* eger sozlerin sayi cox olsa font-sizesini deyis */
$(function() {
    $('.card-body').each(function() {

        var $quote = $(".card-p:first", this); //her birinin icindeki demek ucun this-i isledirem
        var $numWords = $quote.text().split(" ").length;

        if (($numWords >= 1) && ($numWords < 5)) {
            $quote.css("font-size", "30px");
        } else if (($numWords >= 5) && ($numWords < 10)) {
            $quote.css("font-size", "20px");
        } else if (($numWords >= 10) && ($numWords < 15)) {
            $quote.css("font-size", "15px");
        } else {
            $quote.css("font-size", "12px");
        }
    });

    $(".question div > i").on("click", function() {
        var question1div = $(this).parent("div").hasClass("content active");
        if (question1div == true) {
            $(this).parent().parent().find("div#z").css("display", "none");
            $(this).parent("div").removeClass().addClass('question1');
            $('.question').css("height", "460px")
            $('.banner-area4').css("height", "710px")
        } else {
            $(this).parent().parent().find("div#z").css("display", "none");;
            $(this).parent().find("div#z").css("display", "block");;
            $(this).parent().parent().find("div#question1").removeClass().addClass('question1');
            $(this).parent("div").removeClass().addClass('content active');
            $('.question').css("height", "580px")
            $('.banner-area4').css("height", "820px")

        }
        /* 
                return false; */
    });

    $('.custom-navbar').on('click', function() {
        $('.main-menu ul').slideToggle(500);
    });

});