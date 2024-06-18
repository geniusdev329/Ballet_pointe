<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ URL::asset('assets/js/custom.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="{{ URL::asset('assets/js/wow.js') }}"></script>
{{-- <script src="{{ URL::asset('assets/js/modal.js') }}"></script> --}}
<script src="{{ URL::asset('assets/js/tag_set.js') }}"></script>
{{-- <script src="{{ URL::asset('assets/js/modal_review.js') }}"></script> --}}
<script>
    new WOW().init();
</script>
<script>
    var swiper = new Swiper(".mySwiper ", {
        slidesPerView: 3.6,
        spaceBetween: 25,
        // loop: true,
        centeredSlides: true,
        speed: 1500,
        // autoplay: {
        //     delay: 2500,
        //     disableOnInteraction: false,
        // },
        breakpoints: {
            375: {
                slidesPerView: 1.3,
                spaceBetween: 10,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 20,
            },
            1024: {
                slidesPerView: 3.6,
                spaceBetween: 20,
            }
        },
    });
</script>
@yield('script')
@yield('script-bottom')
