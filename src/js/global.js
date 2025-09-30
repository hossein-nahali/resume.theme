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

// Mobile Scroll Navbar toggle
(function() {
    var navbar = document.querySelector('.mobile-scroll-navbar');
    if (!navbar) return;

    var lastScrollY = window.scrollY || window.pageYOffset;
    var hasShown = false;
    var isMobile = function() { return window.matchMedia('(max-width: 991.98px)').matches; };

    function updateVisibility() {
        if (!isMobile()) {
            navbar.classList.remove('is-visible');
            hasShown = false;
            return;
        }
        var currentY = window.scrollY || window.pageYOffset;
        if (!hasShown && currentY > 40) {
            navbar.classList.add('is-visible');
            hasShown = true;
        }
        if (currentY < 20) {
            navbar.classList.remove('is-visible');
            hasShown = false;
        }
        lastScrollY = currentY;
    }

    window.addEventListener('scroll', updateVisibility, { passive: true });
    window.addEventListener('resize', updateVisibility);
    document.addEventListener('DOMContentLoaded', updateVisibility);
})();