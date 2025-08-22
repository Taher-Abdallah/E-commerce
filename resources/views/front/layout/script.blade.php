  <div id="scrollTop" class="visually-hidden end-0"></div>
  <div class="page-overlay"></div>

  <script src="{{asset('front-assets')}}/js/plugins/jquery.min.js"></script>
  <script src="{{asset('front-assets')}}/js/plugins/bootstrap.bundle.min.js"></script>
  <script src="{{asset('front-assets')}}/js/plugins/bootstrap-slider.min.js"></script>
  <script src="{{asset('front-assets')}}/js/plugins/swiper.min.js"></script>
  <script src="{{asset('front-assets')}}/js/plugins/countdown.js"></script>
  <script src="{{asset('front-assets')}}/js/theme.js"></script>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
        new Swiper(".product-single__image", {
            loop: true,
            slidesPerView: 1,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
    });
</script>
