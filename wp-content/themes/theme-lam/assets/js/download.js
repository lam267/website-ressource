jQuery(document).ready(function ($) {
    $('.button-filter').on('click', function () {
        let categoryId = $(this).data('id');
        $('.button-filter').removeClass('active');
        $(this).addClass('active');

        $.ajax({
            url: ajax_object.ajax_url,
            type: 'POST',
            data: {
                action: 'filter_downloads',
                category_id: categoryId === 'filter-all' ? 0 : categoryId,
                security: ajax_object.nonce,
            },
            beforeSend: function () {
                $('.downloads-list').html('<p>Loading...</p>');
            },
            success: function (response) {
                $('.downloads-list').html(response);
            },
            error: function () {
                $('.downloads-list').html('<p>An error occurred. Please try again.</p>');
            },
        });
    });
});
