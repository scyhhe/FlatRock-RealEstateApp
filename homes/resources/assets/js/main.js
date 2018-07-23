(($) => {
    $(document).ready(() => {
        /* owl carousel */
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            items: 3,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            center: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        });
        /* end carousel */
        /* flash message fade out */
        setTimeout(() => {
            $('#flash').fadeOut(3500);
        });
        /* end fade out */
    })
})(jQuery);