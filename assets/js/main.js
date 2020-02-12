$(document).ready(function () {

    /* Toggle span humberger navbar */
    $('.third-button').on('click', function () {
        $('.animated-icon3').toggleClass('open');
    });

    $('[data-toggle="slide-collapse"]').on('click', function () {
        $navMenuCont = $($(this).data('target'));
        $navMenuCont.animate({
            'width': 'toggle'
        }, 150);
        $(".menu-overlay").fadeIn(5000);
    });

    $(".menu-overlay").on('click', function (event) {
        $(".navbar-toggle").trigger("click");
        $(".menu-overlay").fadeOut(5000);
    });


    /* Sroll smooth */
    $(function () {
        $('a[href*="#"]:not([href="#carouselExampleControls"])').click(function () {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html, body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });

});