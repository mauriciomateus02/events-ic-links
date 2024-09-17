var swiper = new Swiper('.swiper1', {
    slidesPerView: 5,
    spaceBetween: 15,
    loop: false,
    navigation: {
        nextEl: '.swiper-button-next1',
        prevEl: '.swiper-button-prev1',
    },
    pagination: {
        el: '.swiper-pagination1',
        clickable: true,
    },
    autoplay: {
        delay: 50000,
    },
    breakpoints: {
        640: {
            slidesPerView: 3,
            spaceBetween: 10,
        },
        768: {
            slidesPerView: 4,
            spaceBetween: 20,
        },
        1024: {
            slidesPerView: 6,
            spaceBetween: 10,
        },
    }
});

var swiper = new Swiper('.swiper2', {
    slidesPerView: 5,
    spaceBetween: 15,
    loop: false,
    navigation: {
        nextEl: '.swiper-button-next2',
        prevEl: '.swiper-button-prev2',
    },
    pagination: {
        el: '.swiper-pagination2',
        clickable: true,
    },
    autoplay: {
        delay: 50000,
    },
    breakpoints: {
        640: {
            slidesPerView: 3,
            spaceBetween: 10,
        },
        768: {
            slidesPerView: 4,
            spaceBetween: 20,
        },
        1024: {
            slidesPerView: 6,
            spaceBetween: 10,
        },
    }
});
