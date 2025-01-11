// page teams
$(document).ready(function () {
    $(document).on('click', '.button-filter', function () {
        const $filterItem = $(this).closest('.filter-item');
        $('.filter-item').not($filterItem).removeClass('active');
        $filterItem.toggleClass('active');
    });

    $(document).on('click', '.filter-back', function () {
        $('.filter-item').removeClass('active');
    });

    $(document).on('click', '.item-more', function () {
        const $teamItem = $(this).closest('.team-item');
        $teamItem.find('.popup-team-overlay').addClass('active');
        $teamItem.find('.popup-team').addClass('active');
        disableScroll();
    });

    $(document).on('click', '.popup-team-close, .popup-team-overlay', function () {
        $('.popup-team-overlay').removeClass('active');
        $('.popup-team').removeClass('active');
        enableScroll();
    });
});

function disableScroll() {
    $('body').addClass('no-scroll'); 
}

function enableScroll() {
    $('body').removeClass('no-scroll'); 
}

jQuery(document).ready(function ($) {
    $('.custom-checkbox input[type="checkbox"]').on('change', function () {
        let selectedCategories = [];

        $('.custom-checkbox input[type="checkbox"]:checked').each(function () {
            selectedCategories.push($(this).attr('id').replace('category-', ''));
        });

        sendAjaxRequest(selectedCategories);
    });

    $('#filter-all').on('click', function () {
        $('.button-filter').removeClass('active'); 
        $(this).addClass('active'); 

        sendAjaxRequest([]);
    });

    $('.button-filter').on('click', function () {
        let parentCategoryId = $(this).data('id');
        let selectedCategories = [parentCategoryId]; 

        $('.button-filter').removeClass('active'); 
        $(this).addClass('active'); 
        sendAjaxRequest(selectedCategories);
    });

    function sendAjaxRequest(categories) {
        $.ajax({
            url: ajax_object.ajax_url, 
            type: 'POST',
            data: {
                action: 'filter_team_members',
                categories: categories, 
            },
            beforeSend: function () {
                $('.teams-list').html('<p>Loading...</p>'); 
            },
            success: function (response) {
                $('.teams-list').html(response); 
            },
            error: function () {
                $('.teams-list').html('<p>Something went wrong. Please try again later.</p>');
            },
        });
    }
});
