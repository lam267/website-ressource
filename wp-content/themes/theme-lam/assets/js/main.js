// PAGE HOME    
document.addEventListener('DOMContentLoaded', function () {
    const tabs = document.querySelectorAll('.tab-pill');
    const tabContents = document.querySelectorAll('.tab-content');

    tabs.forEach((tab) => {
        tab.addEventListener('click', function () {
            tabs.forEach((t) => t.classList.remove('active'));

            tab.classList.add('active');

            tabContents.forEach((content) => content.classList.remove('active'));

            const target = tab.getAttribute('data-tab');
            document.getElementById(target).classList.add('active');
        });
    });
});

$(document).ready(function () {
    $(".message-icon").on("click", function () {
        $("#user-popup, #overlay").removeClass("hidden");
        disableScroll();

    });
    $("#close-btn, #overlay ").click(function () {
        $("#user-popup, #overlay").addClass("hidden");
        enableScroll()
    });
    $("a[href='#top']").click(function () {
        $("html, body").animate({ scrollTop: 0 }, "slow");
        return false;
    });
    $(".scroll-top").click(function () {
        $("html, body").animate({ scrollTop: 0 }, 600);
        return false;
    });
    // menu icon in mobile
    $('.menu-icon').click(function () {
        const $headerMenu = $(this).closest('.header-mobile').find('.header-mobile-menu');
        const $icon = $(this);

        if ($headerMenu.hasClass('active')) {
            $icon.html(`
                    <svg width="44" height="43" viewBox="0 0 44 43" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <ellipse cx="21.5579" cy="21.5" rx="21.5579" ry="21.5" fill="white"/>
                        <line x1="15" y1="15" x2="29" y2="15" stroke="#170049" stroke-width="2"/>
                        <line x1="15" y1="21" x2="29" y2="21" stroke="#170049" stroke-width="2"/>
                        <line x1="15" y1="27" x2="29" y2="27" stroke="#170049" stroke-width="2"/>
                    </svg>
                `);
                
            $headerMenu.slideUp(300, function () {
                $headerMenu.removeClass('active');
            });
            enableScroll()
        } else {
            $icon.html(`
                    <svg width="44" height="43" viewBox="0 0 44 43" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <ellipse cx="21.5579" cy="21.5" rx="21.5579" ry="21.5" fill="white"/>
                        <line x1="15.7037" y1="15.2895" x2="28.2525" y2="27.7182" stroke="#170049" stroke-width="2"/>
                        <line y1="-1" x2="17.662" y2="-1" transform="matrix(-0.710499 0.703698 0.703698 0.710499 29.0977 16)" stroke="#170049" stroke-width="2"/>
                    </svg>
                `);
            $headerMenu.slideDown(300, function () {
                $headerMenu.addClass('active');
            });
            disableScroll();
        }

    });
    $('.icon-search ').click(function () {
        const $search = $(this).closest('.header').find('.header-search');

        if ($search.hasClass('active')) {
            $search.slideUp(300, function () {
                $search.removeClass('active');
            });
        } else {
            $search.slideDown(300, function () {
                $search.addClass('active');
            });
        }
    });
});

function disableScroll() {
    $('body').addClass('no-scroll'); 
}

function enableScroll() {
    $('body').removeClass('no-scroll'); 
}
