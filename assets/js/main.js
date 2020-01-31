$(document).ready(function () {

    /* Toggle span humberger navbar */
    $('.third-button').on('click', function () {
        $('.animated-icon3').toggleClass('open');
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