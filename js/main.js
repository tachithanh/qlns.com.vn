
window.addEventListener("load", event => {
    // Anime Modules
    let delay = 1;
    observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.intersectionRatio > 0) {
                entry.target.classList.add('animeModules');
                //entry.target.style.transitionDelay = `${delay}` * 0.2 + "s";
                // delay++;
            }
        });
    });

    function animeModules() {
        document.querySelectorAll('section').forEach(el => observer.observe(el))
        document.querySelectorAll('header').forEach(el => observer.observe(el))
    }

    animeModules();
});

function mainNav() {
    
    const mainNav = document.querySelector('.mainNav'),
        logo = document.querySelector('.mainNav__logo.home img');

    window.onscroll = function () {
        if (window.pageYOffset >= 60) {
            mainNav.classList.add("fixed");
            logo.src = "assets/images/logo.svg";
        } else {
            mainNav.classList.remove("fixed");
            logo.src = "assets/images/logo-white.svg";
        }
    }

    // Open Menu Mobile
    const iconNav = document.querySelector('.mainNav__icon'),
        link = document.querySelectorAll('.mainNav__link');
    iconNav.addEventListener('click', openNavMobile);

    function openNavMobile() {
        if (mainNav.classList.contains('navOpen')) {
            mainNav.classList.remove('navOpen');
            document.querySelector('body').style.overflowY = "initial";
            if (window.innerWidth < 799) {
                setTimeout(() => {
                    document.querySelector('.mainNav .mainNav__wrapper').style.height = "auto";
                }, 600);
            }

        } else {
            mainNav.classList.add('navOpen');
            document.querySelector('body').style.overflowY = "hidden";
            if (window.innerWidth < 799) {
                document.querySelector('.mainNav.navOpen .mainNav__wrapper').style.height = window.innerHeight + "px";
            }
        }
    }

    if (window.innerWidth < 799) {
        link.forEach(function (el) {
            el.addEventListener("click", openNavMobile)
        });
    }

};

mainNav();

/*********************************/
// Slider Heading

function sliderHeading() {

    var mySwiper = new Swiper('.sliderHeading__slider.swiper-container', {
        // Optional parameters
        loop: true,
        speed: 500,

        // If we need pagination
        pagination: {
            el: '.sliderHeading .swiper-pagination',
        },

        // Navigation arrows
        navigation: {
            nextEl: '.sliderHeading .swiper-button-next',
            prevEl: '.sliderHeading .swiper-button-prev',
        },
    });



};

sliderHeading();

/********************************/
// Content Media - About

function contentMedia() {
    const sliderAboutItems = [{
            img: `assets/images/slide.jpg`,
            alt: " ",
        },
        {
            img: `assets/images/slide02.jpg`,
            alt: " ",
        },
        {
            img: `assets/images/intro03.jpg`,
            alt: " ",
        },
        {
            img: `assets/images/intro04.jpg`,
            alt: " ",
        },
    ];

    const contentMedia = [{
            img: `assets/images/default4.jpg`,
            alt: "alt",
            title: "Gi???i thi???u",
            text: "Thi???t k??? ?????c quy???n c???a th????ng hi???u th???i trang Lalla. Form ?????p, thanh l???ch, hi???n ?????i, ch???t li???u cao c???p l?? nh???ng g?? Lalla mu???n g???i g???m v??o nh???ng thi???t k??? ri??ng ?????c quy???n c???a m??nh. Ch??o m???ng ?????n v???i c???a h??ng th???i trang c???a ch??ng t??i!",
            ctaText: "?????c th??m",
            ctaStyle: "cta01"
        },

    ];

    contentMedia.forEach(function (el) {
        let template =`

        <div class="contentMedia__wrapper">
            <div class="contentMedia__sliderContainer">
                <div class="contentMedia__slider swiper-container anime">
                    <div class="swiper-wrapper">
                    </div>
                </div>

                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-pagination"></div>
            </div>

            <div class="contentMedia__content">
                <h2 class="contentMedia__title mainTitle anime">${el.title}</h2>
                <p class="contentMedia__description anime">${el.text}</p>
                <div class="ctaContainer anime"><a href="https://www.facebook.com/lalla.brand/photos/?tab=album&ref=page_internal" target="_blank" rel="noopenner" class="cta ${el.ctaStyle}">${el.ctaText}</a></div>
            </div>
        </div>`;
        
        document.querySelector('.contentMedia.about').insertAdjacentHTML("beforeend", template);


        sliderAboutItems.forEach(function (el) {
            let templateSlider = `
                <div class="swiper-slide">
                    <figure class="contentMedia__image anime">
                        <img src="${el.img}" alt="${el.alt}">
                    </figure>
                </div>`;
            document.querySelector(".contentMedia.about .swiper-wrapper").insertAdjacentHTML("beforeend", templateSlider);
    
        });
    
        var mySwiper = new Swiper('.contentMedia__slider.swiper-container', {
            // Optional parameters
            loop: true,
            speed: 500,
    
            // If we need pagination
            pagination: {
                el: '.contentMedia .swiper-pagination',
                clickable: 'true'
            },
    
            // Navigation arrows
            navigation: {
                nextEl: '.contentMedia .swiper-button-next',
                prevEl: '.contentMedia .swiper-button-prev',
            },
        });


    });
};

contentMedia();

/******************************/
// Products

/*********************************/
// Product Slider

function productSlider() {

    var mySwiper = new Swiper('.productSlider__slider.swiper-container', {
        // Optional parameters
        loop: true,
        speed: 500,
        slidesPerView: 4,
        spaceBetween: 32,

        breakpoints: {
            1023: {
                slidesPerView: 4,
            },
            799: {
                spaceBetween: 24,
                slidesPerView: 3,
            },
            511: {
                spaceBetween: 24,
                slidesPerView: 2,
            },
            0: {
                spaceBetween: 24,
                slidesPerView: 1,
            }

        },

        // If we need pagination
        pagination: {
            el: '.productSlider .swiper-pagination',
        },
        // Navigation arrows
        navigation: {
            nextEl: '.productSlider .swiper-button-next',
            prevEl: '.productSlider .swiper-button-prev',
        },
    });
};

productSlider();


/*********************************/
// Content Media - Collections

function contentMedia2() {
    const contentMedia = [{
            img: `assets/images/contentMedia01.jpg`,
            alt: "alt",
            title: "Collection",
            text: "Nh??? nh??ng, phong c??ch thanh l???ch, hi???n ?????i. S??? k???t h???p tinh t??? v???i 2 s???c m??u hot trend trong n??m l?? h???ng th???ch anh v?? xanh baby blue s??? th???i m???t lu???ng gi?? m???i ?????y ng???t ng??o v?? tr??? trung v??o phong c??ch th???i trang thanh l???ch v???n c?? c???a b???n.",
            ctaText: "?????c th??m",
            ctaStyle: "cta01"
        },

    ];

    contentMedia.forEach(function (el) {
        let template =`

        <div class="contentMedia__wrapper">
            <figure class="contentMedia__image animeImg">
                <img src="${el.img}" alt="${el.alt}">
            </figure>
            <div class="contentMedia__content">
                <h2 class="contentMedia__title mainTitle anime">${el.title}</h2>
                <p class="contentMedia__description anime">${el.text}</p>
                <div class="ctaContainer anime"><a href="https://www.facebook.com/lalla.brand/photos/?tab=album&ref=page_internal" target="_blank" rel="noopenner" class="cta ${el.ctaStyle}">${el.ctaText}</a></div>
            </div>
        </div>`;
        
        document.querySelector('.contentMedia.vineyards').insertAdjacentHTML("beforeend", template);
    })
};

contentMedia2();

/*********************************/
// Highlight Slider -  Testimonials 

function templateTestimonials() {

    const testimonials = {
        title: "Kh??ch H??ng Nh???n X??t",
        img: "images/bgtestimonials.jpg",
        alt: "teste"
    }

    let template = `
        <figure class="highlightSlider__bgImage animeImg">
            <img src="assets/${testimonials.img}" alt="${testimonials.alt}">
        </figure>
        <div class="highlightSlider__wrapper">
            <div class="highlightSlider__heading">
                <h3 class="highlightSlider__title">${testimonials.title}</h3>
            </div>
            <div class="highlightSlider__slider swiper-container">
                <div class="swiper-wrapper">
                </div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>`;
    document.querySelector('.highlightSlider.testimonials').insertAdjacentHTML("beforeend", template);
};

function templateQuotesItem() {
    
    const quotes = [{
            name: "John doe",
            text: "Bi???t n??i g?? ????y, Thi???t k??? c???a Lalla th???t mong manh thu???n khi???t. Ch???t t?? x???p H??n sang x???n b??n ngo??i v?? ?????m l???a l??t b??n trong c??ng t??n n??t d???u d??ng ng???t ng??o c???a ng?????i m???c.",
        },
        {
            name: "Maria doe",
            text: "Ng???t ng??o, sang ch???nh v?? t??n v??c d??ng t???i ??a v???i m???u, Ch???t li???u cao c???p v?? form d??ng ????n gi???n nh??ng t??nh ???ng d???ng cao mang l???i cho ng?????i m???c s??? tao nh??.",
        },
        {
            name: "Midu",
            text: "Quy???n r?? m???t c??ch nh??? nh??ng v?? tinh t??? v???i m???u ?????m c???a Lalla. Thi???t k??? si??u t??n d??ng, ch???t li???u m???m m???i l??n form ng?????i v?? c??ng tho???i m??i. Tay ??o c?? th??? k??o l??n ho???c m???c ki???u tr??? vai. ",
        }
    ];

    quotes.forEach(function (el) {
        let template = `
            <div class="swiper-slide">
                <div class="highlightSlider__content">
                    <div class="highlightSlider__text">
                        <p class="highlightSlider__subtitle anime">${el.text}</p>
                        <p class="highlightSlider__description anime">${el.name}</p>
                    </div>
                </div>
            </div>`;
        document.querySelector(".highlightSlider.testimonials .swiper-wrapper").insertAdjacentHTML("beforeend", template);
    });

    var mySwiper = new Swiper('.testimonials .highlightSlider__slider.swiper-container', {
        // Optional parameters
        loop: true,
        speed: 500,

        // If we need pagination
        pagination: {
            el: '.highlightSlider .swiper-pagination',
        },

        // Navigation arrows
        navigation: {
            nextEl: '.highlightSlider .swiper-button-next',
            prevEl: '.highlightSlider .swiper-button-prev',
        },
    });
}

templateTestimonials();
templateQuotesItem();

/*********************************/
// CTA Block

function ctaBlock() {
    const ctaBlock = [{
        img: `assets/images/content03.jpg`,
        alt: "Wrist watch photo close up",
        title: "Li??n l???c",
        subtitle: "Li??n h??? v???i ch??ng t??i n???u b???n c?? c??u h???i ho???c nh???n x??t v?? ch??ng t??i s??? li??n h??? l???i v???i b???n s???m nh???t c?? th???!",
        text: "",
        ctaText: "G???i email",
        ctaStyle: "cta01"
    }];

    ctaBlock.forEach(function (el) {
        let template = `
        <div class="ctaBlock__wrapper">
            
            <div class="ctaBlock__content">
            <div class="ctaBlock__text">
                <h2 class="ctaBlock__title mainTitle anime">${el.title}</h2>
                <h3 class="ctaBlock__subtitle anime">${el.subtitle}</h3>
                <div class="ctaContainer anime"><a href="" class="cta ${el.ctaStyle}"><span>${el.ctaText}</span></a></div>
                </div>
            </div>
        </div>`;

        document.querySelector('.ctaBlock.one').insertAdjacentHTML("beforeend", template);
    });
};
ctaBlock();