
    $(document).ready(function () {
      $('.counter').counterUp({
        delay: 10,
        time: 1000
      });
    });

    $(document).ready(function () {
      $('#menu-toggle').click(function () {
        $('#mobile-menu').slideToggle();
      });
    });
