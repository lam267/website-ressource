$(document).ready(function () {
    // watch video
    $(".video-play").click(function () {
        $(this).hide();
        $(".video-thumb img").hide();
        const videoSrc = $(".video-thumb iframe").attr("src");
        $(".video-thumb iframe").attr("src", videoSrc + "&autoplay=1");

        $(".video-thumb iframe").show();
    });

    $("#carousel1").owlCarousel({
        loop: true,
        margin: 43,
        nav: false,
        autoWidth: false,
        dots: false,
        responsive: {
            0: {
                items: 1 
            },
            600: { 
                items: 1
            },
            1000: { 
                items: 1.35   
            },
            1900: { 
                items: 2 
            },
            3800: { 
                items: 4 
            },
            7600: { 
                items:  8
            }
        }
    });
    
    
    $(".prev1").click(function () {
        $("#carousel1").trigger("prev.owl.carousel");
    });
    $(".next1").click(function () {
        $("#carousel1").trigger("next.owl.carousel");
    });

    // services-owl-carousel
    $("#carousel2").owlCarousel({
        loop: true,
        margin: 44,
        autoWidth: true,
        responsive: {
            0: {
                items: 2,
                margin: 29,
            },
            600: {
                items: 2,
            },
            1000: {
                items: 4,
            },
        },
    });
    $(".prev2").click(function () {
        $("#carousel2").trigger("prev.owl.carousel");
    });
    $(".next2").click(function () {
        $("#carousel2").trigger("next.owl.carousel");
    });

    // testimonial-list 
    $('#carousel4').owlCarousel({
        loop:true,
        margin: 15,
        responsiveClass:true,
        dots:false,
        nav:false,
        responsive: {
            0: {
                margin: 31,
                items: 1,
            },
            577: {
                items: 1.1,
            },
            768: {
                items: 1.2,
            },
            1100: {
                items: 1,
            },
            1300: {
                items: 1.13,
            }
        }
    })
    $(".prev4").click(function () {
        $("#carousel4").trigger("prev.owl.carousel");
    });
    $(".next4").click(function () {
        $("#carousel4").trigger("next.owl.carousel");
    });

    // swiper network content
    $("#carousel3").owlCarousel({
        loop: true,
        margin: 44,
        autoWidth: true,
        responsive: {
            769: {
                items: 4,
            },
        },
    });
    $(".prev3").click(function () {
        $("#carousel3").trigger("prev.owl.carousel");
    });
    $(".next3").click(function () {
        $("#carousel3").trigger("next.owl.carousel");
    });
   
    $('.category-tags .tag').on('click', function (e) {
        e.preventDefault();
        $('.category-tags .tag').removeClass('active');
        $(this).addClass('active');

        const selectedCategory = $(this).data('category');

        $('.list-tags').removeClass('active');
        $(`#${selectedCategory}`).addClass('active');
        initSwiper(selectedCategory);

    });
    const initialCategory = $('.category-tags .tag.active').data('category');
    $(`#${initialCategory}`).addClass('active'); 
    initSwiper(initialCategory);
    // slide network mobi
    $('.company-card').click(function () {
        const $companyBox = $(this).closest('.company-box');
        const $iconArrow = $companyBox.find('.arrow');

        const isActive = $companyBox.hasClass('active');
        if(!isActive) {
            $companyBox.addClass('active');
        
              $iconArrow.html(`
                  <svg width="11" height="16" viewBox="0 0 11 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <line x1="5.6875" y1="15.0791" x2="5.6875" y2="1.00027" stroke="#ffff"/>
                    <path d="M1 4.70605L5.44595 1.0011L9.89189 4.70605" stroke="#ffff"/>
                </svg>
              `);
        }else {
            $companyBox.removeClass('active');
            $iconArrow.html(`
                <svg width="11" height="15" viewBox="0 0 11 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5.20508 0C5.20508 0 5.20508 8.58071 5.20508 14.0788" stroke="#170049"/>
                <path d="M9.89258 10.373L5.44663 14.078L1.00068 10.373" stroke="#170049"/>
                </svg>
               `);
        }
    });
});
var swiperInstance;
function initSwiper(selectedCategory) {
    const swiperContainer = $(`#${selectedCategory} .swiper`);

    if (swiperContainer.length) {
        if (!swiperInstance || swiperInstance.el !== swiperContainer[0]) {
            if (swiperInstance) {
                swiperInstance.destroy(true, true); 
            }
            swiperInstance = new Swiper(swiperContainer[0], {
                direction: "vertical",
                slidesPerView: 4.5,
                spaceBetween: 13,
                grabCursor: true,
                top:30,
                watchOverflow: false, 
                loop: true,
                navigation: {
                    nextEl: '.next-slide',
                    prevEl: '.prev-slide',
                },
                on: {
                    slideChange: function () {
                        updateActiveSlide(this.activeIndex);
                    }
                }
            });

            swiperContainer.find('.swiper-slide').on('click', function () {
                const index = $(this).index();
                updateActiveSlide(index);
            });
            var partnerItems = document.querySelectorAll(".partner-detail .partner-item");

            swiperInstance.on("slideChange", function () {
              var activeIndex = swiperInstance.realIndex;
              partnerItems.forEach(function (item) {
                item.classList.remove("active");
              });
          
              if (partnerItems[activeIndex]) {
                partnerItems[activeIndex].classList.add("active");
              }
            });
        }
    }
}
function updateActiveSlide(activeIndex) {
    const activeList = $('.list-tags.active');

    activeList.find('.swiper-slide').removeClass('swiper-slide-active');
    activeList.find('.swiper-slide').eq(activeIndex).addClass('swiper-slide-active');

    activeList.find('.partner-item').removeClass('active');
    activeList.find('.partner-item').eq(activeIndex).addClass('active');
}
