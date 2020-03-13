$(function() {
    /*   $.ajax({
          type: 'POST',
          url: 'ajax.php',
          data: {
              'adsoyad': "Zaur Aliyev"
          },
          success: function(response) {
              alert(response.adsoyad);
              console.log(response);
          },
          dataType: "json"
      }) */


    //post ucun bele yaza bilerik

    /*  $.post(
        'ajax.php', { 'adsoyad': "Zaur Aliyev" },
        function(response) { alert(response.adsoyad); }, "json");

 */


    //get ucun bele yaza bilerik

    $.get(
        'ajax.php', { 'adsoyad': "Zaur Aliyev" },
        function(response) { alert(response.adsoyad); }, "json");

});