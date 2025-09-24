new Swiper(".project-slider", {
    navigation: {
        nextEl: ".blog-slider-next",
        prevEl: ".blog-slider-prev",
    },
    slidesPerView: 2,
    spaceBetween: 32,
    autoplay: {
        delay: 3500,
        disableOnInteraction: false,
    },
    breakpoints: {
        0: {
            slidesPerView: 1.1,
            spaceBetween: 16,
        },
        // Extra small (mobile)
        320: {
            slidesPerView: 1.1,
            spaceBetween: 16,
        },
        // Small (≥576px)
        576: {
            slidesPerView: 1.1,
            spaceBetween: 20,
        },
        // Medium (≥768px)
        768: {
            slidesPerView: 1.6,
            spaceBetween: 24,
        },
        // Large (≥992px)
        992: {
            slidesPerView: 1.7,
            spaceBetween: 28,
        },
        // Extra large (≥1200px)
        1200: {
            slidesPerView: 1.9,
            spaceBetween: 32,
        },
        // Extra extra large (≥1400px)
        1400: {
            slidesPerView: 2.2,
            spaceBetween: 32,
        },
    },
});
