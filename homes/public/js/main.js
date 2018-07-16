(($) => {
    $(document).ready(() => {
        // console.log(123);

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
        
        /* confirm property deletion prompt */
        $('#delete-property').submit((e) => {
            e.preventDefault();
            console.log('form submitted');
            swal({
                'type' : 'warning',
                'title' : 'Are you sure?',
                'text' : 'You are about to delete this property. This is irevirsible. Please confirm your choice',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    swal('Deleted!', 'success');
                    $(this).submit();
                }  
            });
        });

        /* end.... */
    })
})(jQuery);