// page teams
$(document).ready(function () {
    toggleOwlCarousel(); 

    $(window).resize(function () {
        toggleOwlCarousel(); 
    });
    $(".video-play").click(function () {
        $(this).hide();
        const videoSrc = $(".video-box iframe").attr("src");
        $(".video-box iframe").attr("src", videoSrc + "&autoplay=1");
        $(".video-box iframe").show();
    });
});
function toggleOwlCarousel() {
    var $relatedPosts = $('#related-posts');
    if ($(window).width() < 768) {
        if (!$relatedPosts.hasClass('owl-loaded')) {
            $relatedPosts.addClass('owl-carousel owl-theme');
            $relatedPosts.owlCarousel({
                loop: true,
                margin: 20,
                autoWidth: true,
                responsive: {
                    0: {
                        items: 1,
                    },
                    768: {
                        items: 2,
                    }
                },
            });
            $(".prev2").click(function () {
                $relatedPosts.trigger("prev.owl.carousel");
            });
            $(".next2").click(function () {
                $relatedPosts.trigger("next.owl.carousel");
            });
        }
    } else {
        if ($relatedPosts.hasClass('owl-loaded')) {
            $relatedPosts.trigger('destroy.owl.carousel');
            $relatedPosts.removeClass('owl-carousel owl-theme owl-loaded');
            $relatedPosts.find('.owl-stage-outer').children().unwrap();
            $relatedPosts.css('style', '');
        }
    }
}
function disableScroll() {
    $('body').addClass('no-scroll'); 
}

function enableScroll() {
    $('body').removeClass('no-scroll'); 
}
jQuery(document).ready(function ($) {
    $(".tag-pill").on("click", function () {
        $(".tag-pill").removeClass("active");
        $(this).addClass("active");

        const category_id = $(this).data("id");
        if (category_id === "all") {
            location.reload(); 
        } else {
            $.ajax({
                url: ajax_objects.ajax_url,
                type: 'POST',
                data: {
                    action: 'filter_posts',
                    category_id: category_id,
                },
                beforeSend: function () {
                    $('#news-card-box').html('<p>Loading...</p>');
                },
                success: function (response) {
                    $('#news-card-box').html(response);
                },
                error: function () {
                    $('#news-card-box').html('<p>An error occurred. Please try again.</p>');
                },
            });
        }
    });
});
